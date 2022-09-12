<?php

namespace App\Console\Commands;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class StartUserSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'name:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Session at start Date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $res = Reservation::get();



        foreach ($res as $r) {

            $carbon = Carbon::parse($r->start_date);
            $carbon_end = Carbon::parse($r->end_date);

            $carbon_now = Carbon::parse(now());

            $start_date = $carbon->format('Y-m-d H:i');

            $end_date = $carbon_end->format('Y-m-d H:i');

            $start_now = $carbon_now->format('Y-m-d H:i');

            if ($start_now < $start_date) {

                $r->update([
                    'status' => 'pending',
                ]);
            }

            if ($start_now >= $start_date and $start_now < $end_date) {

                $r->update([
                    'status' => 'underway',
                ]);
            }

            if ($start_now >= $end_date) {

                $r->update([
                    'status' => 'complete',
                ]);
            }
        }
    }
}
