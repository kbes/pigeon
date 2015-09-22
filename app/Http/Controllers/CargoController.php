<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Cargo\Contracts\CargoInterface;
use View;

class CargoController extends Controller
{
    /**
     * The ticket repository implementation class
     * @var App\Data\Cargo\Contracts\CargoInterface
     */
    private $cargo;

    /**
     * @param App\Data\Cargo\Contracts\CargoInterface $cargo
     */
    public function __construct(CargoInterface $cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $allCargo = $this->cargo->get();

        return View::make('cargo.index')
            ->with('allCargo', $allCargo);
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
