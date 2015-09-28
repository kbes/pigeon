<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Cargo\Contracts\CargoInterface;
use App\Data\Category\Contracts\CategoryInterface;
use Input;
use Response;
use View;

class CargoController extends Controller
{
    /**
     * The category repository implementation class
     * @var App\Data\Category\Contracts\CategoryInterface
     */
    private $categories;
    /**
     * The cargo repository implementation class
     * @var App\Data\Cargo\Contracts\CargoInterface
     */
    private $cargo;

    /**
     * @param App\Data\Cargo\Contracts\CargoInterface $cargo
     * @param App\Data\Category\Contracts\CategoryInterface $cargo
     */
    public function __construct(CargoInterface $cargo, CategoryInterface $categories)
    {
        $this->middleware('auth');
        $this->cargo = $cargo;
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $cargo = $this->cargo->get();
        $categories = $this->categories->get();

        return View::make('cargo.index')
            ->with('categories', $categories)
            ->with('allCargo', $cargo);
    }

    /**
     * Fetch item specs
     */
    public function postItem()
    {
        $id = Input::get('id');

        $item = $this->cargo->find($id);

        return Response::json(['item' => $item], 200);
    }

    /**
     * Save or update depending on present item id
     */
    public function postSaveItem()
    {
        $data = Input::get('data');

        $id = null;
        if ($data['id']) {
            $this->cargo->update($data['id'], $data);
            $new = false;
        } else {
            $item = $this->cargo->create($data);
            $id = $item['id'];
            $new = true;
        }

        return Response::json([
            'item' => $data,
            'id'   => $id,
            'new'  => $new
        ], 200);
    }

    public function postDeleteItem()
    {
        $id = Input::get('id');
        $this->cargo->delete($id);

        return Response::json([], 200);
    }
}
