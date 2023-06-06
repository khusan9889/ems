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
}
