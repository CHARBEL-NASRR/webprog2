<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Str;
use Laravel\Passport\Client as PassportClient;
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
          $this->ensurePersonalAccessClientExists();
    Passport::tokensExpireIn(now()->addDays(15));
    Passport::refreshTokensExpireIn(now()->addDays(30));
    Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }


        protected function ensurePersonalAccessClientExists(): void
    {
        if (!PassportClient::where('personal_access_client', true)->exists()) {
            $client = PassportClient::create([
                'name' => 'Personal Access Client',
                'secret' => Str::random(40),
                'redirect' => env('APP_URL', 'http://127.0.0.1'),
                'personal_access_client' => true,
                'password_client' => false,
                'revoked' => false,
            ]);
        }
}
 
}
