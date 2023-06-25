<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ACSServiceInterface;
use App\Services\Contracts\PolytraumaServiceInterface;
use App\Traits\ApiResponse;

class StatisticsController extends Controller
{
    use ApiResponse;

    public function acs(ACSServiceInterface $service)
    {
        return $this->success($service->apiData());
    }

    public function polytrauma(PolytraumaServiceInterface $service)
    {
        return $this->success($service->apiData());
    }
}
