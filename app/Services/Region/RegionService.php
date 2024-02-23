<?php

namespace App\Services\Region;


use App\Models\OdsAmbulanceRegions;
use App\Services\Region\Contracts\RegionServiceInterface;
use App\Traits\Crud;
use Illuminate\Http\Request;

class RegionService implements RegionServiceInterface
{
    use Crud;

    public $modelClass = OdsAmbulanceRegions::class;

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
                $filters['name'],
                fn($query, $value) => $query->where('name', 'like', '%' . $filters['name'] . '%')
            )
            ->when(
                $filters['coato'],
                fn($query, $value) => $query->where('coato', 'like', '%' . $filters['coato'] . '%')
            );
        $perPage = 15;
        $results = $query->paginate($perPage);

        return $results;
    }
}
