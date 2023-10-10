<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubFilialRequest;
use App\Http\Requests\UpdateSubFilialRequest;
use App\Http\Resources\FilialSubWeekResource;
use App\Models\FilialSubWeek;
use App\Services\FilialSubWeek\Contracts\FilialSubWeekServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FilialSubWeekController extends Controller
{
    use ApiResponse;

    public $modelClass = FilialSubWeek::class;
    public function index(Request $request,FilialSubWeekServiceInterface $service)
    {
        $collection = $service->filter($request);
        $result = FilialSubWeekResource::collection($collection)->resource;
        return $this->success($result);
    }

    public function store(StoreSubFilialRequest $request, FilialSubWeekServiceInterface $service)
    {
        $result = new FilialSubWeekResource($service->store($request));
        return $this->success($result);
    }

    public function show($id)
    {
        $result = new FilialSubWeekResource($this->modelClass::findOrFail($id));
        return $this->success($result);
    }

    public function update(UpdateSubFilialRequest $request, $id, FilialSubWeekServiceInterface $service)
    {
        $result = new FilialSubWeekResource($service->update($id, $request));
        return $this->success($result);
    }

    public function destroy($id)
    {
        return $this->success($this->modelClass::destroy($id));
    }
}
