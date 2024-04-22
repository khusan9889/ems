<?php

namespace App\Http\Controllers;

use App\Models\ACS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Barryvdh\DomPDF\Facade\Pdf;


class PrintController extends Controller
{
    public function create_pdf(Request $request, $id)
    {
        $acs = ACS::findOrFail($id);
        $pdf = Pdf::loadView('dashboard.pages.print', ['acs' => $acs]);
        return $pdf->download();
    }

}
