<?php

namespace App\Http\Controllers;

use App\Models\ACS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class PrintController extends Controller
{
    public function create_pdf(Request $request, $id)
    {

        $mpdf = new \Mpdf\Mpdf(); // mPDF obyektini yaratish
        $mpdf->WriteHTML('<h1>Hello World!</h1>'); // HTML qo'shish
        $mpdf->Output('doc.pdf', 'D');
        return $mpdf;


//        $acs = ACS::findOrFail($id);
//        $mpdf_uz = new \Mpdf\Mpdf();
//        $application_file_uz = 'uztest.pdf';
//        $view_uz = View::make('dashboard.pages.print', compact('acs'));
//        $html_content_uz = $view_uz->render();
//        $mpdf_uz->WriteHTML($html_content_uz);
//        $mpdf_uz->Output('MyPDF.pdf', 'D');
//        $uz = 'storage/certificates/' . $application_file_uz;
//        return $uz;
    }
}
