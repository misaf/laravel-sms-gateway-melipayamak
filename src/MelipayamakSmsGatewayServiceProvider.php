<?php

declare(strict_types=1);

namespace Misaf\LaravelSmsGatewayMelipayamak;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Misaf\LaravelSmsGateway\SmsGatewayManager;
use Misaf\LaravelSmsGatewayMelipayamak\Drivers\MelipayamakDriver;

final class MelipayamakSmsGatewayServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(SmsGatewayManager::class, function (SmsGatewayManager $manager): void {
            $manager->extend('melipayamak', fn(Application $app): MelipayamakDriver => $app->make(MelipayamakDriver::class));
        });
    }
}
