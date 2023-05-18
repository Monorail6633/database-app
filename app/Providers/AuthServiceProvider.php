<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Item;
use App\Policies\ItemPolicy;
use App\Models\Transaction;
use App\Policies\TransactionPolicy;
use App\Models\SerialNumber;
use App\Policies\SerialNumberPolicy;
use App\Models\TransactionDetail;
use App\Policies\TransactionDetailPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('manage-items', [ItemPolicy::class, 'manage']);
        Gate::define('manage-transaction', [TransactionPolicy::class, 'manage']);
        Gate::define('manage-transactiondetail', [TransactionDetailPolicy::class, 'manage']);
        Gate::define('manage-serialnumber', [SerialNumberPolicy::class, 'manage']);

        Gate::define('access-reports', function (User $user) {
            return $user->hasRole('superadmin');
        });
    }
}
