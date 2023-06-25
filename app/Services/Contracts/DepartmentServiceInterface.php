<?php

namespace App\Services\Contracts;

interface DepartmentServiceInterface
{   
    public function filter();

    public function customStore($request);

    public function customUpdate($id, $request);
}
