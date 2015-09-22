<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Data\Category\Contracts\CategoryInterface;
use View;

class CategoryController extends Controller
{
    /**
     * The ticket repository implementation class
     * @var App\Data\Category\Contracts\CategoryInterface
     */
    private $categories;

    /**
     * @param App\Data\Category\Contracts\CategoryInterface $categories
     */
    public function __construct(CategoryInterface $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $allCategories = $this->categories->get();

        return View::make('categories.index')
            ->with('categories', $allCategories);
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
