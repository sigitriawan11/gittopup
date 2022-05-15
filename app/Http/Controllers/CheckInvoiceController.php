<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class CheckInvoiceController extends Controller
{
    public function check(){
        return view('invoice.index', [
            'title' => 'Check Invoice',
            'payments' => Payment::latest()->get()
        ]);
    }

    public function checkRequest(Request $request){
        $validate = $request->validate([
            'invoice' => 'required'
        ]);

        $data = Order::where('invoice', $validate['invoice'])->first();

        if($data){
            $cek = cekInvoice($data['code'], $data['customer_no'], $data['invoice']);
        } else {
            return back()->with('error', 'Data tidak ditemukan');
        }

        return back()->with(compact('data', 'cek'));
    }
}
