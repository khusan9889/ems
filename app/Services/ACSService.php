<?php

namespace App\Services;

use App\Models\ACS;
use App\Services\Contracts\ACSServiceInterface;
use App\Traits\Crud;
use Illuminate\Pagination\LengthAwarePaginator;

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
        return $this->modelClass::create($data);
    }

    public function customFilter(array $filters): LengthAwarePaginator
    {
        $query = $this->modelClass::query();

        // Filter by department
        if (isset($filters['department'])) {
            $query->where('department', $filters['department']);
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

        // Add more filters for other columns if needed
        return $this->filter($filters);
    }

}

