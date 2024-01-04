<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('delete:inactive_users chippy@gmail.com')
        ->before(function(){
         //Do some thing before this
         Log::info('Starting command execution...');
        })
        ->after(function(){
         //Do some thing after this
         // For example:-send mail to admin regarding deleted users
         Log::info('Finishing command execution...');
        })
        ->hourly();
        $schedule->command('cache:clear')->fridays();
        $schedule->command('view:clear')->daily();
        //$schedule->command('view:clear')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
