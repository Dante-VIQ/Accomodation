<?php

namespace App\Providers;

use App\Livewire\RoomCard;
use App\Livewire\ServiceCard;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->singleton(CalendarServiceManager::class, function ($app) {
        //     return new CalendarServiceManager();
        // });

        // // Alias for convenience
        // $this->app->alias(CalendarServiceManager::class, 'calendar');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // In your AppServiceProvider boot method:

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Only run database queries if the roles table exists
        if (Schema::hasTable('roles')) {
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
                        $user->syncRoles(['master']); // Always force them to be master
                    }
                }
            }

            // ✔ Assign default user role to everyone else
            User::created(function ($user) {
                $defaultRole = env('DEFAULT_ROLE', 'user');

                // Don't override engineer or master emails
                if ($user->email === env('ENGINEER_EMAIL')) {
                    return;
                }

                if (
                    collect(explode(',', env('MASTER_EMAILS', '')))
                        ->map(fn ($e) => trim($e))
                        ->contains($user->email)
                ) {
                    return;
                }

                // Assign default role
                $user->assignRole($defaultRole);
            });
        }

        Livewire::component('service-card', ServiceCard::class);
        Livewire::component('reservation', RoomCard::class);
    }
}
