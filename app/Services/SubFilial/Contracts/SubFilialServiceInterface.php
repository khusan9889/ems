<?php

namespace App\Services\SubFilial\Contracts;

use Illuminate\Http\Request;

interface SubFilialServiceInterface
{
    public function filter(Request $request);

    public function store(Request $request);

    public function update(Request $request,$id);
    public function customFilter(array $filters);

}
