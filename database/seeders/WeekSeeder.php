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
                    'g_sleeping'=>null,
                    'g_ambulator'=>null,
                    'y_appeal'=>null,
                    'y_sleeping'=>null,
                    'y_ambulator'=>null,
                    'r_appeal'=>null,
                    'r_sleeping'=>null,
                    'r_death'=>null,
                    'r_dead'=>null,
                    'ambulance_03'=>null,
                    'children_03'=>null,
                    'arrived_himself'=>null,
                    'children_arrived_himself'=>null,
                    'came_ticket'=>null,
                    'children_came_ticket'=>null,
                    'recumbent'=>null,
                    'children_recumbent'=>null,
                    'operation'=>null,
                    'children_operation'=>null,
                    'high_tech_operas'=>null,
                    'children_high_tech_operas'=>null,
                    'death'=>null,
                    'children_death'=>null,
                    'ambulator'=>null,
                    'children_ambulator'=>null,
                    'ambulatory_operas'=>null,
                    'including_children'=>null
                ]);
                $sub_filials=SubFilial::where('branch_id',$item->id)->get();
                foreach ($sub_filials as $index => $data) {
                    FilialSubWeek::create([
                        'week_id' => $week->id,
                        'branch_id' => $item->id,
                        'sub_filial_id' => $data->id,
                        'g_appeal'=>null,
                        'g_sleeping'=>null,
                        'g_ambulator'=>null,
                        'y_appeal'=>null,
                        'y_sleeping'=>null,
                        'y_ambulator'=>null,
                        'r_appeal'=>null,
                        'r_sleeping'=>null,
                        'r_death'=>null,
                        'r_dead'=>null,
                        'ambulance_03'=>null,
                        'children_03'=>null,
                       'arrived_himself'=>null,
                       'children_arrived_himself'=>null,
                       'came_ticket'=>null,
                       'children_came_ticket'=>null,
                       'recumbent'=>null,
                       'children_recumbent'=>null,
                       'operation'=>null,
                       'children_operation'=>null,
                       'high_tech_operas'=>null,
                       'children_high_tech_operas'=>null,
                       'death'=>null,
                       'children_death'=>null,
                       'ambulator'=>null,
                       'children_ambulator'=>null,
                       'ambulatory_operas'=>null,
                       'including_children'=>null
                    ]);
                }

            }

        }
    }
}
