<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class canceled extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:cancel';

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
        $data = Order::where('status_id', 1)->latest()->get();

        foreach($data as $d){
            Order::where('id', $d['id'])->first()->update(['status_id' => 3]);
        }
    }
}
