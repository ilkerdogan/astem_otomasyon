<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return view('iletisim', [
            'pageTitle'       => 'İletişim | Astem Otomasyon',
            'metaDescription' => 'Astem Otomasyon iletişim bilgileri. Adres, telefon, e-posta ve çalışma saatlerimize ulaşın.',
        ]);
    }
}
