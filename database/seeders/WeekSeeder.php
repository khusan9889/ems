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
                    'branch_id' => $item->id,
                    'g_sleeping'=>random_int(10, 99),
                    'g_ambulator'=>random_int(10, 99),
                    'y_appeal'=>random_int(10, 99),
                    'y_sleeping'=>random_int(10, 99),
                    'y_ambulator'=>random_int(10, 99),
                    'r_appeal'=>random_int(10, 99),
                    'r_sleeping'=>random_int(10, 99),
                    'r_death'=>random_int(10, 99),
                    'r_dead'=>random_int(10, 99),
                    'ambulance_03'=>random_int(10, 99),
                    'children_03'=>random_int(10, 99),
                    'arrived_himself'=>random_int(10, 99),
                    'children_arrived_himself'=>random_int(10, 99),
                    'came_ticket'=>random_int(10, 99),
                    'children_came_ticket'=>random_int(10, 99),
                    'recumbent'=>random_int(10, 99),
                    'children_recumbent'=>random_int(10, 99),
                    'operation'=>random_int(10, 99),
                    'children_operation'=>random_int(10, 99),
                    'high_tech_operas'=>random_int(10, 99),
                    'children_high_tech_operas'=>random_int(10, 99),
                    'death'=>random_int(10, 99),
                    'children_death'=>random_int(10, 99),
                    'ambulator'=>random_int(10, 99),
                    'children_ambulator'=>random_int(10, 99),
                    'ambulatory_operas'=>random_int(10, 99),
                    'including_children'=>random_int(10, 99)
                ]);
                $sub_filials=SubFilial::where('branch_id',$item->id)->get();
                foreach ($sub_filials as $index => $data) {
                    FilialSubWeek::create([
                        'week_id' => $week->id,
                        'branch_id' => $item->id,
                        'sub_filial_id' => $data->id,
                        'g_appeal'=>random_int(10, 99),
                        'g_sleeping'=>random_int(10, 99),
                        'g_ambulator'=>random_int(10, 99),
                        'y_appeal'=>random_int(10, 99),
                        'y_sleeping'=>random_int(10, 99),
                        'y_ambulator'=>random_int(10, 99),
                        'r_appeal'=>random_int(10, 99),
                        'r_sleeping'=>random_int(10, 99),
                        'r_death'=>random_int(10, 99),
                        'r_dead'=>random_int(10, 99),
                        'ambulance_03'=>random_int(10, 99),
                        'children_03'=>random_int(10, 99),
                       'arrived_himself'=>random_int(10, 99),
                       'children_arrived_himself'=>random_int(10, 99),
                       'came_ticket'=>random_int(10, 99),
                       'children_came_ticket'=>random_int(10, 99),
                       'recumbent'=>random_int(10, 99),
                       'children_recumbent'=>random_int(10, 99),
                       'operation'=>random_int(10, 99),
                       'children_operation'=>random_int(10, 99),
                       'high_tech_operas'=>random_int(10, 99),
                       'children_high_tech_operas'=>random_int(10, 99),
                       'death'=>random_int(10, 99),
                       'children_death'=>random_int(10, 99),
                       'ambulator'=>random_int(10, 99),
                       'children_ambulator'=>random_int(10, 99),
                       'ambulatory_operas'=>random_int(10, 99),
                       'including_children'=>random_int(10, 99)
                    ]);
                }

            }

        }
    }
}
