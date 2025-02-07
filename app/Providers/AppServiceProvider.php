<?php

namespace App\Providers;

use App\Services\UsuarioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{

    /**
     * Register any application services.
     */
    public function register(): void{
        $this->app->singleton('usuario.service', function(){
            return new UsuarioService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

}
