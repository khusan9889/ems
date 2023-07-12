<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Polytrauma;
use App\Services\Contracts\PolytraumaServiceInterface;
use App\Traits\Crud;
use Exception;

class PolytraumaService implements PolytraumaServiceInterface
{
    use Crud;

    public $modelClass = Polytrauma::class;

    public function filter()
    {
        return $this->modelClass::whereLike('name')
            ->whereEqual('key')
            ->whereBetween2('created_at')
            ->whereBetween2('updated_at')
            ->sort()
            ->customPaginate();
    }

    public function customStore($request)
    {
        return $this->store($request);
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
            fn($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['hospitalization_channels'],
                fn($query, $value) => $query->where('hospitalization_channels', $value)
            )
            ->when(
                $filters['branch'],
                fn($query, $value) => $query->where('branch_id', $value)
            );

        // Filter by history disease
        if (isset($filters['history_disease'])) {
            $query->where('history_disease', 'like', "%{$filters['history_disease']}%");
        }

        if (isset($filters['department'])) {
            $departmentName = $filters['department'];
            $query->whereHas('department', function ($subQuery) use ($departmentName) {
                $subQuery->where('name', 'like', '%' . $departmentName . '%');
            });
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

        // Filter by hospitalization channels
        if (isset($filters['hospitalization_channels'])) {
            $hospitalizationChannels = $filters['hospitalization_channels'];
            if ($hospitalizationChannels !== '') {
                if (!is_array($hospitalizationChannels)) {
                    $hospitalizationChannels = [$hospitalizationChannels];
                }
                $query->whereIn('hospitalization_channels', $hospitalizationChannels);
            }
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
        //1
        $result[] = [
            'title' => 'Доля пациентов, которые выписаны',
            'value' => round($tmp->where('treatment_result', 'Выписан')->count() / $n * 100)
        ];
        //2
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов, которые умерли',
            'value' => round($tmp->where('treatment_result', 'Летальный исход')->count() / $n * 100)
        ];
        //3
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с тяжестью состояния TS <4',
            'value' => round($tmp->where('severity_of_ts', '<', 4)->count() / $n * 100)
        ];
        // 4
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с тяжестью состояния TS ≥ 4',
            'value' => round($tmp->where('severity_of_ts', '>=', 4)->count() / $n * 100)
        ];
        // 5
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с тяжестью повреждения "незначительные (ISS <9 баллов)"',
            'value' => round($tmp->where('injury_of_iss', '<', 9)->count() / $n * 100)
        ];
        // 6
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с тяжестью повреждения "умеренные (ISS 9–15 баллов)"',
            'value' => round($tmp->whereBetween('injury_of_iss', [9,15])->count() / $n * 100)
        ];
        // 7
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с тяжестью повреждения "тяжелые (ISS 16–25 баллов)"',
            'value' => round($tmp->whereBetween('injury_of_iss', [16,25])->count() / $n * 100)
        ];
        // 8
        $tmp = $data;
        $result[] = [
            'title' => 'Доля пациентов с тяжестью повреждения "крайне тяжелые (ISS >25 баллов)"',
            'value' => round($tmp->where('injury_of_iss', '>', 25)->count() / $n * 100)
        ];
        // 9
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки до 1 часа',
            'value' => round($tmp->where('arrival_after_injury', 'до 1ч.')->count() / $n * 100)
        ];
        // 10
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки 1-3 ч.',
            'value' => round($tmp->where('arrival_after_injury', '1-3ч.')->count() / $n * 100)
        ];
        // 11
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки 6-12 ч.',
            'value' => round($tmp->where('arrival_after_injury', '6-12ч.')->count() / $n * 100)
        ];
        // 12
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки 12-24 ч.',
            'value' => round($tmp->where('arrival_after_injury', '12-24ч.')->count() / $n * 100)
        ];
        // 13
        $result[] = [
            'title' => 'Доля пациентов, поступивших в сроки позже 24 ч.',
            'value' => round($tmp->where('arrival_after_injury', 'позже 24ч.')->count() / $n * 100)
        ];
        // 14
        $result[] = [
            'title' => 'Доля пациентов с механизмом травмы "ДТП"',
            'value' => round($tmp->where('mechanism_of_injury', 'ДТП')->count() / $n * 100)
        ];
        // 15
        $result[] = [
            'title' => 'Доля пациентов с механизмом травмы "Кататравма"',
            'value' => round($tmp->where('mechanism_of_injury', 'Кататравма')->count() / $n * 100)
        ];
        // 16
        $result[] = [
            'title' => 'Доля пациентов с механизмом травмы "Производственная"',
            'value' => round($tmp->where('mechanism_of_injury', 'Производственная')->count() / $n * 100)
        ];
        // 17
        $result[] = [
            'title' => 'Доля пациентов с механизмом травмы "Прочие"',
            'value' => round($tmp->where('mechanism_of_injury', 'Прочие')->count() / $n * 100)
        ];
        // 18
        $result[] = [
            'title' => 'Доля пациентов, которые осмотрены хирургом',
            'value' => round($tmp->where('survey_of_surgeon', ' Да')->count() / $n * 100)
        ];
        // 19
        $result[] = [
            'title' => 'Доля пациентов, которые осмотрены нейрохирургом',
            'value' => round($tmp->where('survey_of_neurosurgeon', 'Да')->count() / $n * 100)
        ];
        // 20
        $result[] = [
            'title' => 'Доля пациентов, которые осмотрены травматологом',
            'value' => round($tmp->where('survey_of_traumatologist', 'Да')->count() / $n * 100)
        ];
        // 21
        $result[] = [
            'title' => 'Доля пациентов, которые осмотрены другими узкими специалистами',
            'value' => round($tmp->where('narrow_specialists', 'Да')->count() / $n * 100)
        ];
        // 22
        $result[] = [
            'title' => 'Доля пациентов, кому проведена R-графия (черепа, грудной клетки, костей таза, конечностей)',
            'value' => round($tmp->where('r_graphy', 'Да')->count() / $n * 100)
        ];
        // 23
        $result[] = [
            'title' => 'Доля пациентов, которым проведено УЗС (плевральных и брюшной полостей, забрюшинного пространства)',
            'value' => round($tmp->where('conducted_ultrasound', 'Да')->count() / $n * 100)
        ];
        // 24
        $result[] = [
            'title' => 'Доля пациентов, которым проведена МСКТ (всего тела “full body”)',
            'value' => round($tmp->where('msct', 'Да')->count() / $n * 100)
        ];
        // 25
        $result[] = [
            'title' => 'Доля пациентов, которым Проведена МСКТ (отдельных частей тела)',
            'value' => round($tmp->where('msct_individual_parts', 'Да')->count() / $n * 100)
        ];
        // 26
        $result[] = [
            'title' => 'Доля пациентов, у которых имеются нейтральные жиры в крови и моче',
            'value' => round($tmp->where('neutral_fats', 'Да')->count() / $n * 100)
        ];
        // 27
        $result[] = [
            'title' => 'Доля пациентов, которым проведен анализ  Нв, Ht в динамике',
            'value' => round($tmp->where('analysis_of_hb_ht', 'Да')->count() / $n * 100)
        ];
        // 28
        $result[] = [
            'title' => 'Доля пациентов, которым проведено УЗС в динамике',
            'value' => round($tmp->where('dynamic_uzs', 'Да')->count() / $n * 100)
        ];
        // 29
        $result[] = [
            'title' => 'Доля пациентов, которым выполнена диагностическая лапароскопия',
            'value' => round($tmp->where('diagnostic_laparoscopy', 'Да')->count() / $n * 100)
        ];
        // 30
        $result[] = [
            'title' => 'Доля пациентов, которым выполнен Торакоцентез',
            'value' => round($tmp->where('thoracocentesis', 'Да')->count() / $n * 100)
        ];
        // 31
        $result[] = [
            'title' => 'Доля пациентов, которым выполнена Лапаратомия',
            'value' => round($tmp->where('laparotomy', 'Да')->count() / $n * 100)
        ];
        // 32
        $result[] = [
            'title' => 'Доля пациентов, которым выполнена Торакоскопия (торакотомия)',
            'value' => round($tmp->where('thoracoscopy_thoracotomy', 'Да')->count() / $n * 100)
        ];
        // 33
        $result[] = [
            'title' => 'Доля пациентов, которым выполнена остеосинтез переломов',
            'value' => round($tmp->where('osteosynthesis_of_fractures', 'Да')->count() / $n * 100)
        ];
        //34
        $result[] = [
            'title' => 'Доля пациентов, которым выполнена Трепанация черепа',
            'value' => round($tmp->where('skull_trepanation', 'Да')->count() / $n * 100)
        ];


        return $result;
    }
}
