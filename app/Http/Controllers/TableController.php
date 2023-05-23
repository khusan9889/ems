<?php

namespace App\Http\Controllers;

use App\Models\ACS;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function fullTable()
    {
        $data = ACS::paginate(10); // Update the model and pagination as per your application

        return view('full-table', compact('data'));
    }
}
