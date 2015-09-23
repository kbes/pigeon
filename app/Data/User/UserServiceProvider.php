<?php namespace App\Data\User;

use Illuminate\Support\ServiceProvider;

use App\Data\User\Models\User;
use App\Data\User\Contracts\UserInterface;
use App\Data\User\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider 
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, function() {
            return new UserRepository(
                new User
            );
        });
    }
}