<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
    public function filter();

    public function customStore($request);

    public function customUpdate($id, $request);

    public function customfilter(array $filters);

}
