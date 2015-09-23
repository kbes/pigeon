<?php namespace App\Data\User\Repositories;

use App\Data\Repository;

use App\Data\User\Models\User;
use App\Data\User\Contracts\UserInterface;

class UserRepository extends Repository implements UserInterface
{

    /**
     * Constructor
     * 
     * @param User $model
     */
    function __construct(User $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}