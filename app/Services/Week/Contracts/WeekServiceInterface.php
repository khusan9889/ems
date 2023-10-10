<?php

namespace App\Services\Week\Contracts;

use Illuminate\Http\Request;

interface WeekServiceInterface
{
    public function filter(Request $request);

    public function store(Request $request);

    public function update(Request $request,$id);
}
