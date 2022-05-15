<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class Information extends Controller
{
    public function about(){
        return view('informasi.about', [
            'title' => 'GitTopup - Tentang',
            'payments' => Payment::latest()->get()
        ]);
    }
    public function privacy(){
        return view('informasi.privacy', [
            'title' => 'GitTopup - Kebijakan Privasi',
            'payments' => Payment::latest()->get()
        ]);
    }
    public function service(){
        return view('informasi.service', [
            'title' => 'GitTopup - Ketentuan Layanan',
            'payments' => Payment::latest()->get()
        ]);
    }
}
