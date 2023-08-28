<?php

namespace App\Providers;

use App\Policies\AdminPolicy;
use Illuminate\Support\Facades\Gate;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('index-approval_table', [AdminPolicy::class, 'index']);
        Gate::define('aside_btn', [AdminPolicy::class, 'aside_btn']);
        Gate::define('aside', [AdminPolicy::class, 'aside']);
        Gate::define('btn', [AdminPolicy::class, 'btn']);

    }
}
