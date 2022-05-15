<?php

namespace App\Models;

use App\Models\Status;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
