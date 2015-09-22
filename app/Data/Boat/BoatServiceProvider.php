<?php namespace App\Data\Boat;

use Illuminate\Support\ServiceProvider;

use App\Data\Boat\Models\Boat;
use App\Data\Boat\Contracts\BoatInterface;
use App\Data\Boat\Repositories\BoatRepository;

class BoatServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BoatInterface::class, function() {
            return new BoatRepository(
                new Boat
            );
        });
    }
}