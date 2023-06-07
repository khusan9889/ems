<?php

namespace App\Services;

use App\Models\Polytrauma;
use App\Services\Contracts\PolytraumaServiceInterface;
use App\Traits\Crud;
use Illuminate\Pagination\Paginator;

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
        return $this->modelClass::create($data);
    }

    public function customFilter(array $filters)
    {
        $query = $this->modelClass::query();

        // Filter by department
        if (isset($filters['department'])) {
            // dd(1);
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

        $perPage = 10; // Adjust the number of records per page as needed
        $results = $query->paginate($perPage);

        return $results;
    }
}
