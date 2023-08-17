<?php

namespace App\Console;

use App\Mail\WeeklyReport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $startTime=new Carbon('2023-08-16 11:00:00');
        $endTime=new Carbon('2023-08-16 12:00:01');
        $schedule->call(function()  {
            Mail::to('chamikararuchiranga1@gmail.com')->send(new WeeklyReport("WELCOME Chamikara Ruchiranga!"));
        })->everyMinute()->when(function() use($startTime,$endTime){
            $now=Carbon::now();
            $countTime=$now->diffInMinutes($startTime);
            return $now->between($startTime,$endTime)&&($countTime%20)==0;
        });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
