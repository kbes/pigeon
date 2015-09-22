<?php namespace App\Data\Category;

use Illuminate\Support\ServiceProvider;

use App\Data\Category\Models\Category;
use App\Data\Category\Contracts\CategoryInterface;
use App\Data\Category\Repositories\CategoryRepository;

class CategoryServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, function() {
            return new CategoryRepository(
                new Category
            );
        });
    }
}