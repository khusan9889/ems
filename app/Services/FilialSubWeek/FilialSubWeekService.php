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
}
