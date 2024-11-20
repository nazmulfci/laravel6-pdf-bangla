<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;  

class InvoiceController extends Controller
{
    public function generateInvoice()
    {
        $mpdf = new Mpdf([
            'fontDir' => [public_path('fonts')],
            'default_font' => 'samir',
            'fontdata' => [
                'samir' => [
                    'R' => 'samir.ttf',
                ]
            ]
        ]);
        
        // ফন্ট সেট করুন
        $mpdf->SetFont('samir', '', 12); // সঠিক সাইজ সেট করা
        $mpdf->WriteHTML('<style>body { font-family: samir; }</style>');
        
        // HTML কন্টেন্ট
        $html = '
            <h1>বাংলা ইনভয়েস</h1>
            <p>এটি একটি উদাহরণ ইনভয়েস।</p>
        ';
        
        $mpdf->WriteHTML($html);
        $mpdf->Output('invoice.pdf', 'I');
    }
}
