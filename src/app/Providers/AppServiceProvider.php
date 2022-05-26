<?php

namespace App\Providers;

use App\Crud\PersonRepository\Contract\CrudPersonContract;
use App\Crud\PersonRepository\PersonsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrudPersonContract::class, PersonsRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
