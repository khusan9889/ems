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
            $query->where('branch_id', $filters['branch']);
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

        return $query->paginate(10);
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
}
