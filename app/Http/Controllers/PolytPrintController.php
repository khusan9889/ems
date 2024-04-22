<?php

namespace App\Http\Controllers;

use App\Models\Polytrauma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;


class PolytPrintController extends Controller
{
    public function create_pdf(Request $request, $id)
    {
        $polyt = Polytrauma::findOrFail($id);
        $pdf = Pdf::loadView('dashboard.pages.print', ['polyt' => $polyt]);
        return $pdf->download();
    }

}
