<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayMelipayamak;

use Illuminate\Contracts\Foundation\Application;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayMelipayamak\Drivers\MelipayamakDriver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class MelipayamakSmsGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-sms-gateway-melipayamak');
    }

    public function packageRegistered(): void
    {
        $this->app->afterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager, Application $app): void {
            $manager->extend('melipayamak', fn (): MelipayamakDriver => $app->make(MelipayamakDriver::class));
        });

        if ($this->app->bound('sms-gateway')) {
            $this->app->make('sms-gateway')->extend('melipayamak', fn (): MelipayamakDriver => $this->app->make(MelipayamakDriver::class));
        }
    }
}