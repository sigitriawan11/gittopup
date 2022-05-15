<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index(Brand $brand){
        return view('order.index', [
            'title' => 'GitToptup - ' . $brand->name,
            'brand' => $brand,
            'products' => Product::orderBy('price', 'asc')->where('brand_id', $brand->id)->latest()->get(),
            'payments' => Payment::latest()->get(),
            'balance' =>  getBalance()
        ]);
    }

    public function order(Request $request){

        if(getBalance() < (int) $request->price){
            return back()->with('error', 'Layanan ini sedang ada gangguan, hubungi admin');
        }

        foreach(getProductGames() as $product){
            if($product['buyer_sku_code'] == $request->code){
                if($product['seller_product_status'] == false){
                    Alert::error('Maaf', 'Layanan ini sedang ada gangguan, hubungi admin');
                    return back();
                }
            }
        }

        $rules = [
            'product' => 'required',
            'code' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'payment' => 'required'
        ];

        if($request->second){
            $rules['first'] = 'required';
            $rules['second'] = 'required';

            $validate = $request->validate($rules);
            if($request->brand == "LifeAfter Credit"){
                $validate['customer_no'] = $validate['first'] . '-' . $validate['second'];
            } else {
                $validate['customer_no'] = $validate['first'] . $validate['second'];
            }

        } else {
            $rules['first'] = 'required';

            $validate = $request->validate($rules);
            $validate['customer_no'] = $validate['first'];
        }

        if((int) $validate['price'] < 25000){
            $validate['tax'] = mt_rand(25, 150);
        } else if((int) $validate['price'] >= 25000 && (int) $validate['price'] < 100000){
            $validate['tax'] = mt_rand(120, 400);
        } else if((int) $validate['price'] >= 100000 && (int) $validate['price'] < 220000){
            $validate['tax'] = mt_rand(350, 800);
        } else if((int) $validate['price'] >= 220000 && (int) $validate['price'] < 450000){
            $validate['tax'] = mt_rand(400, 900);
        } else if((int) $validate['price'] >= 450000){
            $validate['tax'] = mt_rand(500, 1100);
        }

        $grand_price = (int) $validate['price'] + (int) $validate['tax'];
        $validate['grand_price'] = $grand_price;
        $validate['invoice'] = 'TRX000' . Str::upper(Str::random(12));

        Order::create([
            'product' => $validate['product'],
            'code' => $validate['code'],
            'brand' => $validate['brand'],
            'price' => $validate['price'],
            'grand_price' => $validate['grand_price'],
            'tax' => $validate['tax'],
            'payment_id' => $validate['payment'],
            'customer_no' => $validate['customer_no'],
            'invoice' => $validate['invoice'],
            'status_id' => 1
        ]);

        return redirect('/inv/' . $validate['invoice'])->with(compact('validate'));
    }

    public function paid(Order $order){
        return view('order.paid', [
            'title' => 'GitTopup - Transaksi Kamu',
            'order' => $order
        ]);
    }
}
