<?php namespace App\Data\Trip\Repositories;

use App\Data\Repository;

use App\Data\Trip\Models\Trip;
use App\Data\Trip\Contracts\TripInterface;

class TripRepository extends Repository implements TripInterface
{

    /**
     * Constructor
     * 
     * @param Trip $model
     */
    function __construct(Trip $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}