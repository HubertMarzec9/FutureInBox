<?php

namespace App\Console;

use App\Mail\LetterMail;
use App\Models\Letter;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $letters = Letter::whereDate('delivery_date', '=', date("Y-m-d"))->get();

            foreach ($letters as $letter){
                Mail::to($letter->user->email)->send(new LetterMail($letter));

            }
        })->everyFiveMinutes();
            //->dailyAt('08:00');
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
