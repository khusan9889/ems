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

        dd($id);
        $polyt = Polytrauma::findOrFail($id);

        $mpdf_uz = new Mpdf();
        $application_file_uz = 'uztest.pdf';

        $view_uz = View::make('dashboard.pages.polyt-print', compact('polyt'));

        $html_content_uz = $view_uz->render();
        $mpdf_uz->WriteHTML($html_content_uz);
        $mpdf_uz->Output('MyPDF.pdf', 'D');
        // $mpdf_uz->Output(storage_path('app/public/' . $application_file_uz), 'F');
        $uz = 'storage/certificates/' . $application_file_uz;
        return $uz;
    }

}
