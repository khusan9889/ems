<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;


class PrintController extends Controller
{
    public function create_pdf()
    {


        $mpdf_uz = new Mpdf();
        $application_file_uz = 'uztest.pdf';
        $view_uz = View::make('dashboard/pages/print');
        $html_content_uz = $view_uz->render();
        $mpdf_uz->WriteHTML($html_content_uz);
        $mpdf_uz->Output('MyPDF.pdf', 'D');
        // $mpdf_uz->Output(storage_path('app/public/' . $application_file_uz), 'F');
        $uz = 'storage/certificates/' . $application_file_uz;
        return $uz;
    }
}
