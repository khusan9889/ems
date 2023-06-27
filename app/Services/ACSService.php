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
        // ->get();

        // Filter by department
        if (isset($filters['branch'])) {
            $branchId = $filters['branch']; // Assuming the value is the branch ID
            $query->where('branch_id', $branchId);
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

        if (isset($filters['stat_department_full_name'])) {
            $query->where('stat_department_full_name', 'like', "%{$filters['stat_department_full_name']}%");
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

        $data = $this->modelClass::whereDate('created_at', '>=', $date_start)
            ->wheredate('created_at', '<=', $date_end)->get();
        $n = $data->count() ?? 1;
        if (!$n) $n = 1;
        $result = [];
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые выписаны',
            'value' => $tmp->where('treatment_result', 'Выписан')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые умерли',
            'value' => $tmp->where('treatment_result', 'Летальный исход')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые выписаны в тяжелом состоянии',
            'value' => $tmp->where('treatment_result', 'Выписан в тяжелом состоянии')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с исходом в ОИМ с Q',
            'value' => $tmp->where('final_result', 'ОИМ с Q')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с исходом в ОИМ без Q',
            'value' => $tmp->where('final_result', 'ОИМ без Q')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с исходом в прогрессирующую стенокардию',
            'value' => $tmp->where('final_result', 'Прогрессирующая стенокардия')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки до 6 часов',
            'value' => $tmp->where('anginal_attack_date', 'до 6ч.')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки 6-12 часов',
            'value' => $tmp->where('anginal_attack_date', '6-12ч.')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки позже 12 часов',
            'value' => $tmp->where('anginal_attack_date', 'позже 12ч.')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым показана экстренное ЧКВ',
            'value' => $tmp->where('cta_invasive_angiography', 'Да')->count() / $n * 100
        ];

        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым показана отсроченное ЧКВ',
            'value' => $tmp->where('deferred_cta_invasive', 'Да')->count() / $n * 100
        ];

        $tmp = $data;
        $tmp1 = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым выполнено экстренное ЧКВ',
            // 'value' => $tmp->where('cta_90min', 'Да')->where('cta_invasive_angiography', 'Да')->count() / $tmp1->where('cta_invasive_angiography')->count() * 100
            'value' => 'check'
        ];
        // 13 gacha tayyor
        $tmp = $data;
        $tmp1 = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым выполнено отсроченное ЧКВ',
            'value' => $tmp1->where('deferred_cta_invasive', 'Да')->count() > 0 ? $tmp->where('deferred_cta_completed', 'Да')->count() / $tmp1->where('deferred_cta_invasive', 'Да')->count() * 100 : 0
        ];
        //14
        $tmp = $data;
        $tmp1 = $data;
        $tmp2 = $data;
        $tmp3 = $data;

        $numerator = $tmp->where('cta_90min', 'Да')->count() + $tmp2->where('deferred_cta_completed', 'Да')->count();
        $denominator = $tmp1->where('deferred_cta_completed', 'Да')->count() + $tmp3->where('cta_invasive_angiography', 'Да')->count();

        $isDenominatorPositive = $denominator > 0;
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

        $isDenominatorPositive = $denominator > 0;
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

        $result[] = [
            'title' => 'Доля пациентов, которым ЧКВ не выполнено по причине отказа больного',
            'value' => $value
        ];
        //22
        $tmp = $data;

        $numerator = $tmp->where('thrombolytic_therapy', 'Да')->count();
        $denominator = $n;

        $isDenominatorPositive = $denominator > 0;
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

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
        $value = $isDenominatorPositive ? ($numerator / $denominator) * 100 : 0;

        $result[] = [
            'title' => 'Доля пациентов, которым выполнена ТЛТ',
            'value' => $value
        ];
        //24
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым не выполнена ТЛТ',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //25
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым ТЛТ не проведена по причине наличия медицинских противопоказаний',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //26
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым ТЛТ не проведена по причине отсутствия препарата',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //27
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым ТЛТ не проведена по причине отказа больного',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //28
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым выполнена ЭКГ',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //29
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым не выполнена ЭКГ',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //30
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с подъемом сегмента ST',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //31
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым проведено измерение ФВ',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //32
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым измерение ФВ выполнено в сроки ≤3 суток',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //33
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым измерение ФВ выполнено в сроки > 3 суток',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //34
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым проведены анализы на ЛПНП',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //35
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым не проведены анализы на ЛПНП',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //36
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым проведены анализ на АЧТВ',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //37
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым не проведены анализ на АЧТВ',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //38
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым проведена антикоагулянтная терапия',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //39
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которым не проведена антикоагулянтная терапия',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //40
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые принимали аспирин',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //41
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые не принимали аспирин',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //42
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые принимали ингибиторы P2Y12',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //43
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые не принимали ингибиторы P2Y12',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //44
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые принимали статины высокой интенсивности',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //45
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые не принимали статины высокой интенсивности',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //46
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые принимали ингибиторы АПФ или БРАII',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];
        //47
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые не принимали ингибиторы АПФ или БРАII',
            'value' => $tmp->where('cta_90min', 'Да')->count() / $n * 100
        ];


        return $result;
    }
}
