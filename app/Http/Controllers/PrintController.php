<?php

namespace App\Http\Controllers;

use App\Models\ACS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;


class PrintController extends Controller
{
    public function create_pdf(Request $request, $id)
    {
        $acs = ACS::findOrFail($id);
        $mpdf_uz = new Mpdf( ['tempDir' => '/tmp']);
        return $acs;
        $view_uz = View::make('dashboard.pages.print', compact('acs'));
        $html_content_uz = $view_uz->render();
        $mpdf_uz->WriteHTML($html_content_uz);
        $mpdf_uz->Output('doc.pdf', 'D');
        $uz = 'storage/certificates/' . $application_file_uz;
        return $uz;
    }
    public function generatePDF()
    {
        $mpdf = new Mpdf();
        $mpdf->WriteHTML('<h1>Hello World!</h1><p>Welcome to mPDF with Laravel.</p>');
        $mpdf->Output('example.pdf', 'I');  // Brauzerda PDFni ko'rsatadi
    }

}
