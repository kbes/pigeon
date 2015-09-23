<?php namespace App\Data\TripSubdestination\Repositories;

use App\Data\Repository;

use App\Data\TripSubdestination\Models\TripSubdestination;
use App\Data\TripSubdestination\Contracts\TripSubdestinationInterface;

class TripSubdestinationRepository extends Repository implements TripSubdestinationInterface
{

    /**
     * Constructor
     * 
     * @param TripSubdestination $model
     */
    function __construct(TripSubdestination $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}