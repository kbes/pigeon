<?php namespace App\Data\Destination\Repositories;

use App\Data\Repository;

use App\Data\Destination\Models\Destination;
use App\Data\Destination\Contracts\DestinationInterface;

class DestinationRepository extends Repository implements DestinationInterface
{

    /**
     * Constructor
     * 
     * @param Destination $model
     */
    function __construct(Destination $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}