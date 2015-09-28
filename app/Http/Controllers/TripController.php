<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Trip\Contracts\TripInterface;
use Auth;
use View;

class TripController extends Controller
{
    /**
     * The trip repository implementation class
     * @var App\Data\Trip\Contracts\TripInterface
     */
    private $trips;

    /**
     * @param App\Data\Trip\Contracts\TripInterface $trip
     */
    public function __construct(TripInterface $trips)
    {
        $this->trips = $trips;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $allTrips = $this->trips->orderBy('id', 'DESC')->get();

        // Filter user-related
        foreach ($allTrips as $key => $trip) {
            if ($trip->boat->user_id != Auth::user()->id) {
                unset($allTrips[$key]);
            }
        }

        return View::make('trips.index')
            ->with('trips', $allTrips);
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
