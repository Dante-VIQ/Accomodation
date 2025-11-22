<?php

namespace App\Providers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
 // Create all roles from env
    $roles = explode(',', env('MASTER_ROLES', ''));
    foreach ($roles as $roleName) {
        $roleName = trim($roleName);
        if ($roleName !== '') {
            Role::firstOrCreate(['name' => $roleName]);
        }
    }

        // Assign ENGINEER role to one specific email
    $engineerEmail = env('ENGINEER_EMAIL');
    if ($engineerEmail) {
        $user = User::where('email', $engineerEmail)->first();
        if ($user) {
            $user->syncRoles(['engineer']); // Priority role
        }
    }
    // Assign master role to specific emails
    $masterEmails = explode(',', env('MASTER_EMAILS', ''));

    foreach ($masterEmails as $email) {
        $email = trim($email);
        if ($email !== '') {
            if ($user = User::where('email', $email)->first()) {
                $user->syncRoles(['master']);   // Always force them to be master
            }
        }
    }
    }
}
