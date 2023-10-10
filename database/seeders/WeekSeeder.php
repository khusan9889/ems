<?php

namespace Database\Seeders;

use App\Models\Week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date=now();
        for ($i=$date;$i<$date;$date=+5) {
            Week::created( [
                'name' => $date+"-"+$date+5,
                'start_date' => $date,
                'end_date' => $date+5
            ]);
        }
    }
}
