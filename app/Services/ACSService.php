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
        $n = $data->count();
        foreach ($data as $item) {

        }
    }
}
