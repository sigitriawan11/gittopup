<?php

namespace App\Console\Commands;

use App\Models\History;
use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class mutasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:mutasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {
        $tanggal = date('Y-m-d', strtotime(now()));

        $data = Order::whereDate('created_at', $tanggal)->latest()->get();
        $mutasi = cekMutasi();

        foreach($mutasi as $m){
            foreach($data as $d){
                if($m['nama_wallet'] == $d->payment->name && $m['amount'] == $d['grand_price'] && $tanggal == date('Y-m-d', strtotime($d['created_at'])) && $tanggal == date('Y-m-d', strtotime($m['created_at'])) && $d['status_id'] == 1){
                    $order = order($d['code'], $d['customer_no'], $d['invoice']);

                    if($order['rc'] == "00" || $order['rc'] == "01" || $order['rc'] == "02" || $order['rc'] == "03"){
                        Order::where('id', $d['id'])
                            ->first()
                            ->update(['status_id' => 2]);
                    }

                }
            }
        }
    }
}
