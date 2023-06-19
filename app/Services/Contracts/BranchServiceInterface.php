<?php

namespace App\Services\Contracts;

interface BranchServiceInterface
{
    public function filter();

    public function customStore($request);

    public function customUpdate($id, $request);

    public function customfilter(array $filters);

}
