<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Boat\Contracts\BoatInterface;
use Input;
use View;

class BoatController extends Controller
{
    /**
     * The boat repository implementation class
     * @var App\Data\Boat\Contracts\BoatInterface
     */
    private $boats;

    /**
     * @param App\Data\Boat\Contracts\BoatInterface $boats
     */
    public function __construct(BoatInterface $boats)
    {
//        $this->middleware('auth');
        $this->boats = $boats;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $allBoats = $this->boats->get();

        return View::make('boats.index')
            ->with('boats', $allBoats);
    }

    public function getNew()
    {
        return View::make('boats.new');
    }

    public function getEdit($id)
    {
        $boat = $this->boats->find($id);

        return View::make('boats.edit')
            ->with('boat', $boat);
    }
}
