<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Cargo\Contracts\CargoInterface;
use App\Data\Category\Contracts\CategoryInterface;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
}
