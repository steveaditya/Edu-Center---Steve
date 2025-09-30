<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $startTimes = ['08:00:00', '10:00:00', '12:00:00', '14:00:00', '16:00:00'];
        $endTimes = ['10:00:00', '12:00:00', '14:00:00', '16:00:00', '18:00:00'];

        for ($i = 1; $i <= 12; $i++) {
            $kode_mentor = str_pad($i, 3, '0', STR_PAD_LEFT); 

            $user = User::where('kode_mentor', $kode_mentor)->first();

            if ($user) {
                $numSchedules = rand(1, 3);

                for ($j = 0; $j < $numSchedules; $j++) {
                    $day = $days[array_rand($days)];
                    $startTime = $startTimes[array_rand($startTimes)];
                    $endTime = $endTimes[array_rand($endTimes)];

                    Schedule::create([
                        'kode_mentor' => $kode_mentor,
                        'hari' => $day,
                        'jam_mulai' => $startTime,
                        'jam_selesai' => $endTime,
                    ]);
                }
            }
        }
    }
}
