<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all(['id', 'name']);
        return view('dashboard.pages.branch', compact('branches'));
    }
}
