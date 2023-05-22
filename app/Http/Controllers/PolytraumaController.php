<?php

namespace App\Http\Controllers;

use App\Models\Polytrauma;
use Illuminate\Http\Request;

class PolytraumaController extends Controller
{
    public function index(Request $request)
    {
        $data = Polytrauma::all();
        return view('polytrauma.index', compact('data'));
    }
}
