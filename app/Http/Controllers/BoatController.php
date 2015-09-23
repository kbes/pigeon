<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Boat\Contracts\BoatInterface;
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

        return View::make('front.index')
            ->with('boats', $allBoats);
    }
}
