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
}
