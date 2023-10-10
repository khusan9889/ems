<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWeekRequest;
use App\Http\Requests\UpdateWeekRequest;
use App\Http\Resources\WeekResource;
use App\Models\Week;
use App\Services\Week\Contracts\WeekServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class WeekController extends Controller
{
    use ApiResponse;

    public $modelClass = Week::class;
    public function index(Request $request,WeekServiceInterface $service)
    {
        $collection = $service->filter($request);
        $result = WeekResource::collection($collection)->resource;
        return $this->success($result);
    }

    public function store(StoreWeekRequest $request, WeekServiceInterface $service)
    {
        $result = new WeekResource($service->store($request));
        return $this->success($result);
    }

    public function show($id)
    {
        $result = new WeekResource($this->modelClass::findOrFail($id));
        return $this->success($result);
    }

    public function update(UpdateWeekRequest $request, $id, WeekServiceInterface $service)
    {
        $result = new WeekResource($service->update($id, $request));
        return $this->success($result);
    }

    public function destroy($id)
    {
        return $this->success($this->modelClass::destroy($id));
    }
}
