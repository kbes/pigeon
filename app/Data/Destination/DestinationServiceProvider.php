<?php namespace App\Data\Destination;

use Illuminate\Support\ServiceProvider;

use App\Data\Destination\Models\Destination;
use App\Data\Destination\Contracts\DestinationInterface;
use App\Data\Destination\Repositories\DestinationRepository;

class DestinationServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DestinationInterface::class, function() {
            return new DestinationRepository(
                new Destination
            );
        });
    }
}