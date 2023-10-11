<?php

namespace App\Services\SubFilial;


use App\Models\SubFilial;
use App\Services\SubFilial\Contracts\SubFilialServiceInterface;
use App\Traits\Crud;
use Illuminate\Http\Request;

class SubFilialService implements SubFilialServiceInterface
{
    use Crud;

    public $modelClass = SubFilial::class;

    public function filter(Request $request)
    {
        $result = $this->modelClass::sort()->customPaginate();
        return $result;
    }
    public function customFilter(array $filters)
    {
        $query = $this->modelClass::with(['branch'])
            ->when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )

            ->when(
                $filters['branch'],
                fn($query, $value) => $query->where('branch_id', $value)
            );

        $perPage = 10;
        $results = $query->paginate($perPage);

        return $results;
    }
}
