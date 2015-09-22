<?php namespace App\Data\Cargo;

use Illuminate\Support\ServiceProvider;

use App\Data\Cargo\Models\Cargo;
use App\Data\Cargo\Contracts\CargoInterface;
use App\Data\Cargo\Repositories\CargoRepository;

class CargoServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CargoInterface::class, function() {
            return new CargoRepository(
                new Cargo
            );
        });
    }
}