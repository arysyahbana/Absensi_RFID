<?php

namespace App\Console;

use App\Models\Student;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $now = \Carbon\Carbon::now();
            if ($now->hour >= 16) {
                $students = Student::all();
                foreach ($students as $student) {
                    if ($student->alfa < 3) {
                        $student->alfa += 1;
                        $student->save();
                    }
                }
            }
        })->dailyAt('16:00');
    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
