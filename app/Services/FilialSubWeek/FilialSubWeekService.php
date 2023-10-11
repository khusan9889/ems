<?php

namespace App\Services\FilialSubWeek;


use App\Models\FilialSubWeek;
use App\Services\FilialSubWeek\Contracts\FilialSubWeekServiceInterface;
use App\Traits\Crud;
use Illuminate\Http\Request;

class FilialSubWeekService implements FilialSubWeekServiceInterface
{
    use Crud;

    public $modelClass = FilialSubWeek::class;

    public function filter(Request $request)
    {
        $result = $this->modelClass::sort()->customPaginate();
        return $result;
    }
    public function customFilter(array $filters)
    {
        $query = $this->modelClass::with(['week','branch'])->whereNull('sub_filial_id')
            ->when(
                $filters['sort'],
                fn($query, $value) => $query->orderBy('id', $value)
            )

            ->when(
                $filters['branch'],
                fn($query, $value) => $query->where('branch_id', $value)
            )
            ->when(
                $filters['status'],
                fn($query, $value) => $query->where('status', $value)
            )
            ->when(
                $filters['week'],
                fn($query, $value) => $query->where('week_id', $value)
            );

        $perPage = 10;
        $results = $query->paginate($perPage);

        return $results;
    }
}
