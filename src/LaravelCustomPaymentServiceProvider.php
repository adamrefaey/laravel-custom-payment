<?php

namespace MustafaRefaey\LaravelCustomPayment;

use Illuminate\Support\ServiceProvider;
use MustafaRefaey\LaravelCustomPayment\Commands\AddPaymentActionCommand;
use MustafaRefaey\LaravelCustomPayment\Commands\AddPaymentHandlerCommand;

class LaravelCustomPaymentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-custom-payment.php' => config_path('laravel-custom-payment.php'),
            ], 'config');

            $migrationFileName = 'create_laravel_custom_payment_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                AddPaymentHandlerCommand::class,
                AddPaymentActionCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-custom-payment');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-custom-payment.php', 'laravel-custom-payment');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
