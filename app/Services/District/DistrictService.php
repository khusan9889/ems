<?php

namespace App\Services\District;


use App\Models\OdsAmbulanceDistricts;
use App\Services\District\Contracts\DistrictServiceInterface;
use App\Traits\Crud;
use Illuminate\Http\Request;

class DistrictService implements DistrictServiceInterface
{
    use Crud;

    public $modelClass = OdsAmbulanceDistricts::class;

    public function filter(Request $request)
    {
        $result = $this->modelClass::sort()->customPaginate();
        return $result;
    }
    public function customFilter(array $filters)
    {
        $query = $this->modelClass::when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['region_id'],
                fn($query, $value) => $query->where('region_id', $filters['region_id'])
            )
            ->when(
                $filters['name'],
                fn($query, $value) => $query->where('name', 'like', '%' . $filters['name'] . '%')
            )
            ->when(
                $filters['coato'],
                fn($query, $value) => $query->where('coato', 'like', '%' . $filters['coato'] . '%')
            );
        $perPage = 10;
        $results = $query->paginate($perPage);

        return $results;
    }
}
