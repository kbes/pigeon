<?php namespace App\Data\Cargo\Repositories;

use App\Data\Repository;

use App\Data\Cargo\Models\Cargo;
use App\Data\Cargo\Contracts\CargoInterface;

class CargoRepository extends Repository implements CargoInterface
{

    /**
     * Constructor
     * 
     * @param Cargo $model
     */
    function __construct(Cargo $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}