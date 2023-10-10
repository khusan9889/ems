<?php

namespace App\Services\FilialSubWeek\Contracts;

use Illuminate\Http\Request;

interface FilialSubWeekServiceInterface
{
    public function filter(Request $request);

    public function store(Request $request);

    public function update(Request $request,$id);
}
