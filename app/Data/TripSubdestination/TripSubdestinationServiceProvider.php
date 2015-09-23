<?php namespace App\Data\TripSubdestination;

use Illuminate\Support\ServiceProvider;

use App\Data\TripSubdestination\Models\TripSubdestination;
use App\Data\TripSubdestination\Contracts\TripSubdestinationInterface;
use App\Data\TripSubdestination\Repositories\TripSubdestinationRepository;

class TripSubdestinationServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TripSubdestinationInterface::class, function() {
            return new TripSubdestinationRepository(
                new TripSubdestination
            );
        });
    }
}