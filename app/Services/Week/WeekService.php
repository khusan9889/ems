<?php

namespace App\Services\Week;


use App\Models\Week;
use App\Services\Week\Contracts\WeekServiceInterface;
use App\Traits\Crud;
use Illuminate\Http\Request;

class WeekService implements WeekServiceInterface
{
    use Crud;

    public $modelClass = Week::class;

    public function filter(Request $request)
    {
        $result = $this->modelClass::sort()->customPaginate();
        return $result;
    }
}
