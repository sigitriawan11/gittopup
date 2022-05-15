<?php

use Illuminate\Support\Facades\Http;


function getBalance()
{
    $username = env('API_USERNAME');
    $api_key = env('API_KEY');

    $data = [
        'cmd' => 'deposit',
        'username' => $username,
        'sign' => md5($username . $api_key . 'depo')
    ];

    $response = Http::post('https://api.digiflazz.com/v1/cek-saldo', $data)->body();

    return json_decode($response,1)['data'];

}

function getProductGames(){
    $username = env('API_USERNAME');
    $api_key = env('API_KEY');

    $data = [
        'cmd' => 'prepaid',
        'username' => $username,
        'sign' => md5($username . $api_key . 'pricelist')
    ];

    $response = Http::post('https://api.digiflazz.com/v1/price-list', $data)->body();

    $games = [];

    $result = json_decode($response,1)['data'];

    foreach($result as $res){
        if($res['category'] == "Games"){
            $games[] = $res;
        }
    }

    return $games;
}

function order($product_code, $cs, $ref_id){
    $username = env('API_USERNAME');
    $api_key = env('API_KEY');

    $data = [
        'username' => $username,
        'buyer_sku_code' => $product_code,
        'customer_no' => $cs,
        'ref_id' => $ref_id,
        'sign' => md5($username . $api_key . $ref_id)
    ];

    $response = Http::post('https://api.digiflazz.com/v1/transaction', $data)->body();

    return json_decode($response, 1)['data'];
}

function cekMutasi(){
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('BEARER_MUTASI')
        ])->get('https://api.mutasicek.co.id/mutasi');

        return json_decode($response,1)['data'];
}

function cekInvoice($code, $no, $ref){
    $username = env('API_USERNAME');
    $api_key = env('API_KEY');

    $data = [
        'username' => $username,
        'buyer_sku_code' => $code,
        'customer_no' => $no,
        'ref_id' => $ref,
        'sign' => md5($username . $api_key . $ref)
    ];

    $response = Http::post('https://api.digiflazz.com/v1/transaction', $data)->body();

    return json_decode($response,1)['data'];
}
