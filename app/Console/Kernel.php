<?php

namespace App\Console;

use App\Console\Commands\MakeUserRevisor;
use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Http\Middleware\SetCacheHeaders;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    protected $routeMiddleware =[
        'isRevisor' => \App\Http\Middleware\IsRevisor::class,
        'auth' =>  AuthenticateWithBasicAuth::class,
        'auth.session'=> AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeader::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'password.confirm' => RequirePassword::class,
        'precognitive' => \Illuminate\Foundation\Http\Middleware::class,
        'signed' =>  \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequest::class,
        'verified' => EnsureEmailIsVerified::class,
        
    ];

    protected $commands = [
        MakeUserRevisor::class,
    ];

}
