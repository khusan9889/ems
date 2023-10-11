<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\FilialSubWeek;
use App\Models\SubFilial;
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
            $week->name=date('d.m.Y', strtotime($week->start_date)).'-'.date('d.m.Y', strtotime($week->end_date));
            $week->save();
            $date->modify("-$i day");
            $branches = Branch::all();
            foreach ($branches as $index => $item) {
                FilialSubWeek::create([
                    'week_id' => $week->id,
                    'branch_id' => $item->id
                ]);
                $sub_filials=SubFilial::where('branch_id',$item->id)->get();
                foreach ($sub_filials as $index => $data) {
                    FilialSubWeek::create([
                        'week_id' => $week->id,
                        'branch_id' => $item->id,
                        'sub_filial_id' => $data->id
                    ]);
                }

            }

        }
    }
}
