<?php

namespace App\Services\Region\Contracts;

use Illuminate\Http\Request;

interface RegionServiceInterface
{
    public function filter(Request $request);

    public function store(Request $request);

    public function update(Request $request,$id);

    public function customFilter(array $filters);

}
