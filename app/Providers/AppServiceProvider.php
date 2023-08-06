<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (env(key: 'APP_ENV') !== 'local') {
            URL::forceScheme(scheme: 'https');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        // Validator::extend('phone_indonesia', function ($attribute, $value, $parameters, $validator) {
        //     // Aturannya disini untuk memastikan nomor ponsel memiliki kode negara Indonesia (+62)
        //     return preg_match('/^\08\d{9,15}$/', $value);
        // });
    }
}
