<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use App\Traits\Crud;

class UserService implements UserServiceInterface
{
    use Crud;

    public $modelClass = User::class;

    public function filter()
    {

        return $this->modelClass::whereLike('name')
            ->whereLike('phone_number')
            ->whereLike('email')
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
            fn ($query, $value) => $query->orderBy('id', $value)
        );

        if ($filters['branch']) {
            $query->whereHas('branch', function ($query) use ($filters) {
                $query->where('id', $filters['branch']);
            });
        }

        if (isset($filters['department'])) {
            $departmentName = $filters['department'];
            $query->whereHas('department', function ($subQuery) use ($departmentName) {
                $subQuery->where('name', 'like', '%' . $departmentName . '%');
            });
        }

        if ($filters['role']) {
            $query->where('role_id', $filters['role']);
        }

        if ($filters['name']) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if ($filters['email']) {
            $query->where('email', 'like', '%' . $filters['email'] . '%');
        }

        if ($filters['phone_number']) {
            $query->where('phone_number', 'like', '%' . $filters['phone_number'] . '%');
        }

        return $query->paginate(20);
    }

}
