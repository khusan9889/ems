<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Models\Department;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {

        $branches = Branch::all();

        return view('dashboard.pages.branch', compact('branches'));
    }

    public function index_off()
    {
        $result = BranchResource::collection(Branch::all())->resource;
        return $this->success($result);
    }

    public function fetchDepartments(Request $request)
    {
        $data = Department::when($request->branch_id, function ($query, $value) {
            $query->where('branch_id', $value);
        })->get();

        return response()->json($data);
    }
}
