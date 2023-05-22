<?php

namespace App\Http\Controllers;

use App\Models\ACS;
use App\Services\Contracts\ACSServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ACSController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $data = ACS::all();

        return view('acs.index', compact('data'));
    }
}
