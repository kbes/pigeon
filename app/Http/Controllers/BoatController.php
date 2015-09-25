<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Boat\Contracts\BoatInterface;
use Auth;
use Illuminate\Http\Request;
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
     * Path for temporarily storing images before saving them
     *
     * @var string
     */
    private $tempUploadPath;

    /**
     * Path for saving images
     *
     * @var string
     */
    private $uploadPath;

    /**
     * @param App\Data\Boat\Contracts\BoatInterface $boats
     */
    public function __construct(BoatInterface $boats)
    {
        $this->middleware('auth');
        $this->boats = $boats;

        $this->tempUploadPath = public_path() . '/temp_uploads/';
        $this->tempUploadPath = public_path() . '/uploads/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $allBoats = $this->boats->where('user_id', '=', Auth::user()->id)->get();

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
