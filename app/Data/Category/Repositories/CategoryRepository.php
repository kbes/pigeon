<?php namespace App\Data\Category\Repositories;

use App\Data\Repository;

use App\Data\Category\Models\Category;
use App\Data\Category\Contracts\CategoryInterface;

class CategoryRepository extends Repository implements CategoryInterface
{

    /**
     * Constructor
     * 
     * @param Category $model
     */
    function __construct(Category $model)
    {
        $this->model = $model;

        parent::__construct();
    }

}