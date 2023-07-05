<?php

namespace App\Services;

use App\Models\Department;
use App\Services\Contracts\DepartmentServiceInterface;
use App\Traits\Crud;

class DepartmentService implements DepartmentServiceInterface
{
    use Crud;

    public $modelClass = Department::class;

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

    public function customFilter(array $filters)
    {
        $query = $this->modelClass::when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )

        ->when(
            $filters['branch'],
            fn($query, $value) => $query->where('branch_id', $value)
        );

        if (isset($filters['name'])) {
            $query->where('name', 'ilike', "%{$filters['name']}%");
        }

        $perPage = 10;
        $results = $query->paginate($perPage);

        return $results;
    }

}
