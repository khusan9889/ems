<?php

namespace App\Services\Contracts;

interface PolytraumaServiceInterface
{
    public function filter();

    public function customStore($request);

    public function customUpdate($id, $request);

    public function delete($id);

    public function createRecord(array $data);
}
