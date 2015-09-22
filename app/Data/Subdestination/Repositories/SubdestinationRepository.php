<?php namespace App\Data\Subdestination\Repositories;

use App\Data\Repository;

use App\Data\Subdestination\Models\Subdestination;
use App\Data\Subdestination\Contracts\SubdestinationInterface;

class SubdestinationRepository extends Repository implements SubdestinationInterface
{

    /**
     * Constructor
     * 
     * @param Subdestination $model
     */
    function __construct(Subdestination $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}