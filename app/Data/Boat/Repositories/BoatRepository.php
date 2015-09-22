<?php namespace App\Data\Boat\Repositories;

use App\Data\Repository;

use App\Data\Boat\Models\Boat;
use App\Data\Boat\Contracts\BoatInterface;

class BoatRepository extends Repository implements BoatInterface
{

    /**
     * Constructor
     * 
     * @param Boat $model
     */
    function __construct(Boat $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}