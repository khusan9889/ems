<?php

namespace App\Services\District\Contracts;

use Illuminate\Http\Request;

interface DistrictServiceInterface
{
    public function filter(Request $request);

    public function store(Request $request);

    public function update(Request $request,$id);

    public function customFilter(array $filters);

}
