<?php namespace App\Data\Trip;

use Illuminate\Support\ServiceProvider;

use App\Data\Trip\Models\Trip;
use App\Data\Trip\Contracts\TripInterface;
use App\Data\Trip\Repositories\TripRepository;

class TripServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TripInterface::class, function() {
            return new TripRepository(
                new Trip
            );
        });
    }
}