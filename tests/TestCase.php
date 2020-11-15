<?php

namespace MustafaRefaey\LaravelCustomPayment\Tests;

use MustafaRefaey\LaravelCustomPayment\LaravelCustomPaymentServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('vendor:publish', [
            '--provider' => "MustafaRefaey\LaravelCustomPayment\LaravelCustomPaymentServiceProvider",
            '--tag' => "config",
            '--force' => true
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelCustomPaymentServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
    include_once __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
    (new \CreatePackageTable())->up();
     */
    }
}
