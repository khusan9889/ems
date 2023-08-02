<?php

namespace App\Services\Contracts;

interface PolytraumaServiceInterface
{
    public function filter();

    public function apiData();

    public function less16();

    public function statistics($request);

    public function customStore($request);

    public function customUpdate($id, $request);

    public function delete($id);

    public function createRecord(array $data);

    public function customFilter(array $filters);

}
