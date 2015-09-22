<?php namespace App\Data\Subdestination;

use Illuminate\Support\ServiceProvider;

use App\Data\Subdestination\Models\Subdestination;
use App\Data\Subdestination\Contracts\SubdestinationInterface;
use App\Data\Subdestination\Repositories\SubdestinationRepository;

class SubdestinationServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SubdestinationInterface::class, function() {
            return new SubdestinationRepository(
                new Subdestination
            );
        });
    }
}