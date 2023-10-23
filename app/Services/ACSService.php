<?php

namespace App\Services;

use App\Models\ACS;
use App\Models\Branch;
use App\Services\Contracts\ACSServiceInterface;
use App\Traits\Crud;
use Exception;

class ACSService implements ACSServiceInterface
{
    use Crud;

    public $modelClass = ACS::class;

    public function filter()
    {
        return $this->modelClass::whereLike('name')
            ->whereEqual('key')
            ->whereBetween2('created_at')
            ->whereBetween2('updated_at')
            ->sort()
            ->customPaginate();
    }

    public function customStore($data)
    {
        return $this->store($data);
    }

    public function customUpdate($id, $request)
    {
        return $this->update($id, $request);
    }

    public function delete($id)
    {
        $model = $this->modelClass::find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

    public function createRecord(array $data)
    {
        $branchId = $data['branch'] ?? null;
        $branch = Branch::find($branchId);

        if (!$branch) {
            // Branch does not exist in the database
            // You can handle this situation based on your requirements, such as throwing an exception or returning an error message
            throw new Exception('Selected branch does not exist.');
        }

        // Set the branch name in the data array before creating the record
        $data['branch'] = $branch->name;

        return $this->modelClass::create($data);
    }

    public function customFilter(array $filters)
    {
        $query = $this->modelClass::when(
            $filters['sort'],
            fn ($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['hospitalization_channels'],
                fn ($query, $value) => $query->where('hospitalization_channels', $value)
            )

            ->when(
                $filters['branch'],
                fn ($query, $value) => $query->where('branch_id', $value)
            );


        // Filter by department
        if (isset($filters['branch'])) {
            $branchId = $filters['branch']; // Assuming the value is the branch ID
            $query->where('branch_id', $branchId);
        }

        if (isset($filters['department'])) {
            $departmentName = $filters['department'];
            $query->whereHas('department', function ($subQuery) use ($departmentName) {
                $subQuery->where('name', 'like', '%' . $departmentName . '%');
            });
        }

        // Filter by history disease
        if (isset($filters['history_disease'])) {
            $query->where('history_disease', 'like', "%{$filters['history_disease']}%");
        }

        // Filter by full name
        if (isset($filters['full_name'])) {
            $query->where('full_name', 'like', "%{$filters['full_name']}%");
        }

        // Filter by hospitalization date
        if (isset($filters['hospitalization_date'])) {
            $query->where('hospitalization_date', 'like', "%{$filters['hospitalization_date']}%");
        }

        // Filter by discharge date
        if (isset($filters['discharge_date'])) {
            $query->where('discharge_date', 'like', "%{$filters['discharge_date']}%");
        }

        if (isset($filters['physician_full_name'])) {
            $query->where('physician_full_name', 'like', "%{$filters['physician_full_name']}%");
        }



        $perPage = 10; // Adjust the number of records per page as needed
        $results = $query->paginate($perPage);

        return $results;
    }

    public function apiData()
    {
        return $this->modelClass::whereBetween2('created_at', 'date')
            ->sort()
            ->get();
    }

    public function statistics($request)
    {
        $date_end = $request->date_end ?? date('Y-m-d');
        $date_start = $request->date_start ?? date('Y-m-d', strtotime($date_end . ' -30 days'));

        $authUserBranchID = auth()->user()->branch_id;
        // dd($authUserBranchID != 1);
        // dd($request->all());
        $data = $this->modelClass::whereDate('created_at', '>=', $date_start)
            ->wheredate('created_at', '<=', $date_end)
            ->when($request->branch, function ($query, $value) {
                $selectedBranchName = $value;
                if ($selectedBranchName != 'Все') {
                    $selectedBranch = Branch::where('name', $selectedBranchName)->first();
                    $query->where('branch_id', $selectedBranch->id);
                }
            })
            ->when($authUserBranchID != 0, function($query, $value) {
                $query->where('branch_id', auth()->user()->branch_id);
            })
            ->get();

        $n = $data->count() ?? 1;
        if (!$n) $n = 1;
        $result = [];
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые выписаны',
            'value' => round($tmp->where('treatment_result', 'Выписан')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые умерли',
            'value' => round($tmp->where('treatment_result', 'Летальный исход')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые выписаны в тяжелом состоянии',
            'value' => round($tmp->where('treatment_result', 'Выписан в тяжелом состоянии')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с исходом в ОИМ с Q',
            'value' => round($tmp->where('final_result', 'ОИМ с Q')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с исходом в ОИМ без Q',
            'value' => round($tmp->where('final_result', 'ОИМ без Q')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с исходом в прогрессирующую стенокардию',
            'value' => round($tmp->where('final_result', 'Прогрессирующая стенокардия')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки до 6 часов',
            'value' => round($tmp->where('anginal_attack_date', 'до 6ч.')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки 6-12 часов',
            'value' => round($tmp->where('anginal_attack_date', '6-12ч.')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки позже 12 часов',
            'value' => round($tmp->where('anginal_attack_date', 'позже 12ч.')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым показана экстренное ЧКВ',
            'value' => round($tmp->where('cta_invasive_angiography', 'Да')->count() / $n * 100)
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым показана отсроченное ЧКВ',
            'value' => round($tmp->where('deferred_cta_invasive', 'Да')->count() / $n * 100)
        ];

        $tmp = $data;
        $tmp1 = $data;
        $denominator = round($tmp1->where('cta_invasive_angiography')->count());

        $result[] = [
            'title' => 'Доля пациентов, которым выполнено экстренное ЧКВ',
            'value' => round($denominator ? $tmp->where('cta_90min', 'Да')->where('cta_invasive_angiography', 'Да')->count() / $denominator * 100 : 0)
            //            'value' => 'check'
        ];
        // 13 gacha tayyor
        $tmp = $data;
        $tmp1 = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым выполнено отсроченное ЧКВ',
            'value' => round($tmp1->where('deferred_cta_invasive', 'Да')->count() > 0 ? $tmp->where('deferred_cta_completed', 'Да')->count() / $tmp1->where('deferred_cta_invasive', 'Да')->count() * 100 : 0)
        ];
        //14
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;
        $tmp3 = $data;

        $numerator = $tmp->where('cta_90min', 'Да')->count() + $tmp2->where('deferred_cta_completed', 'Да')->count();
        $denominator = $tmp1->where('deferred_cta_completed', 'Да')->count() + $tmp3->where('cta_invasive_angiography', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым выполнено ЧКВ',
            'value' => $value
        ];
        //15
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;
        $tmp3 = $data;

        $numerator = $tmp->where('cta_90min', 'Нет')->count() + $tmp1->where('deferred_cta_completed', 'Нет')->count();
        $denominator = $tmp2->where('cta_invasive_angiography', 'Да')->count() + $tmp3->where('deferred_cta_invasive', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым не выполнено ЧКВ',
            'value' => $value
        ];
        //16
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'медицинские противопоказания')->count();
        $denominator = $tmp1->where('cta_90min', 'Нет')->count() + $tmp2->where('deferred_cta_completed', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ЧКВ не выполнено по медицинским противопоказаниям',
            'value' => $value
        ];
        //17
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'отсутствие специалиста')->count();
        $denominator = $tmp1->where('cta_90min', 'Нет')->count() + $tmp2->where('deferred_cta_completed', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ЧКВ не выполнено по причине отсутствия специалиста',
            'value' => $value
        ];
        //18
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'отсутствие оборудования')->count();
        $denominator = $tmp1->where('cta_90min', 'Нет')->count() + $tmp2->where('deferred_cta_completed', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ЧКВ не выполнено по причине отсутствия оборудования',
            'value' => $value
        ];
        //19
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'занятость оборудования')->count();
        $denominator = $tmp1->where('cta_90min', 'Нет')->count() + $tmp2->where('deferred_cta_completed', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ЧКВ не выполнено по причине занятости оборудования',
            'value' => $value
        ];
        //20
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'отсутствие расходных материалов')->count();
        $denominator = $tmp1->where('cta_90min', 'Нет')->count() + $tmp2->where('deferred_cta_completed', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ЧКВ не выполнено по причине отсутствия расходных материалов',
            'value' => $value
        ];
        //21
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'отказ больного')->count();
        $denominator = $tmp1->where('cta_90min', 'Нет')->count() + $tmp2->where('deferred_cta_completed', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ЧКВ не выполнено по причине отказа больного',
            'value' => $value
        ];
        //22
        $tmp = $data;

        $numerator = $tmp->where('thrombolytic_therapy', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым показана ТЛТ',
            'value' => $value
        ];
        //23
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('thrombolytic_therapy_administered', 'Да')->count();
        $denominator = $tmp1->where('thrombolytic_therapy', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым выполнена ТЛТ',
            'value' => $value
        ];
        //24
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('thrombolytic_therapy_administered', 'Нет')->count();
        $denominator = $tmp1->where('thrombolytic_therapy', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым не выполнена ТЛТ',
            'value' => $value
        ];
        //25
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('not_administering_tlt', 'медицинские противопоказания')->count();
        $denominator = $tmp1->where('thrombolytic_therapy_administered', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ТЛТ не проведена по причине наличия медицинских противопоказаний',
            'value' => $value
        ];
        //26
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'отсутствие препарата')->count();
        $denominator = $tmp1->where('thrombolytic_therapy_administered', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ТЛТ не проведена по причине отсутствия препарата',
            'value' => $value
        ];
        //27
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('reasons_not_performing_cta', 'отказ больного')->count();
        $denominator = $tmp1->where('thrombolytic_therapy_administered', 'Нет')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым ТЛТ не проведена по причине отказа больного',
            'value' => $value
        ];
        //28
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('ecg_during_hospitalization', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым выполнена ЭКГ',
            'value' => $value
        ];
        //29
        $tmp = $data;

        $numerator = $tmp->where('ecg_during_hospitalization', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым не выполнена ЭКГ',
            'value' => $value
        ];
        //30
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('st_segment', 'Да')->count();
        $denominator = $tmp1->where('ecg_during_hospitalization', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов с подъемом сегмента ST',
            'value' => $value
        ];
        //31
        $tmp = $data;

        $numerator = $tmp->where('echocardiogram', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым проведено измерение ФВ',
            'value' => $value
        ];
        //32
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('first_measurement', '≤3 сутки')->count();
        $denominator = $tmp1->where('echocardiogram', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым измерение ФВ выполнено в сроки ≤3 суток',
            'value' => $value
        ];
        //33
        $tmp = $data;
        $tmp1 = $data;

        $numerator = $tmp->where('first_measurement', '>3 суток')->count();
        $denominator = $tmp1->where('ecg_during_hospitalization', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым измерение ФВ выполнено в сроки > 3 суток',
            'value' => $value
        ];
        //34
        $tmp = $data;

        $numerator = $tmp->where('cholestero_levels', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым проведены анализы на ЛПНП',
            'value' => $value
        ];
        //35
        $tmp = $data;

        $numerator = $tmp->where('cholestero_levels', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым не проведены анализы на ЛПНП',
            'value' => $value
        ];
        //36
        $tmp = $data;

        $numerator = $tmp->where('aptt', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым проведены анализ на АЧТВ',
            'value' => $value
        ];
        //37
        $tmp = $data;

        $numerator = $tmp->where('aptt', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым не проведены анализ на АЧТВ',
            'value' => $value
        ];
        //38
        $tmp = $data;

        $numerator = $tmp->where('anticoagulant', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым проведена антикоагулянтная терапия',
            'value' => $value
        ];
        //39
        $tmp = $data;

        $numerator = $tmp->where('anticoagulant', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которым не проведена антикоагулянтная терапия',
            'value' => $value
        ];
        //40
        $tmp = $data;

        $numerator = $tmp->where('aspirin', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые принимали аспирин',
            'value' => $value
        ];
        //41
        $tmp = $data;

        $numerator = $tmp->where('aspirin', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые не принимали аспирин',
            'value' => $value
        ];
        //42
        $tmp = $data;

        $numerator = $tmp->where('p2y12', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые принимали ингибиторы P2Y12',
            'value' => $value
        ];
        //43
        $tmp = $data;

        $numerator = $tmp->where('p2y12', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые не принимали ингибиторы P2Y12',
            'value' => $value
        ];
        //44
        $tmp = $data;

        $numerator = $tmp->where('high_intensity_statins', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые принимали статины высокой интенсивности',
            'value' => $value
        ];
        //45
        $tmp = $data;

        $numerator = $tmp->where('high_intensity_statins', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые не принимали статины высокой интенсивности',
            'value' => $value
        ];
        //46
        $tmp = $data;

        $numerator = $tmp->where('ACE_inhibitors_ARBs', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые принимали ингибиторы АПФ или БРАII',
            'value' => $value
        ];
        //47
        $tmp = $data;

        $numerator = $tmp->where('ACE_inhibitors_ARBs', 'Нет')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = round($isDenominatorPositive ? ($numerator / $denominator) * 100 : 0);

        $result[] = [
            'title' => 'Доля пациентов, которые не принимали ингибиторы АПФ или БРАII',
            'value' => $value
        ];


        return $result;
    }
}
