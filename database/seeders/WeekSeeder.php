<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\FilialSubWeek;
use App\Models\Week;
use Illuminate\Database\Seeder;
use Nette\Utils\DateTime;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Week::truncate();
        FilialSubWeek::truncate();

        $date = new DateTime('2023-08-04');
        $d = new DateTime();
        $d->modify("-14 day");
        for($i=7; $date<$d;)
        {
            $week= new Week();
            $week->start_date=$date->modify("+$i day")->format('Y-m-d');
            $week->end_date=$date->modify("+$i day")->format('Y-m-d');
            $week->name=$week->start_date.','.$week->end_date;
            $week->save();
            $date->modify("-$i day");
            $branches = Branch::all();
            foreach ($branches as $index => $item) {
                FilialSubWeek::create([
                    'week_id' => $week->id,
                    'branch_id' => $item->id
                ]);
            }

        }
    }
}
