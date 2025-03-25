<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
use App\Models\Offre;
use App\Policies\OffrePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     //
    // }
    protected $policies = [
        // 'App\Models\Model' => 'App\policies\ModelPolicy',
        Offre::class => OffrePolicy::class,
    ] ;

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies() ;
    }
}
