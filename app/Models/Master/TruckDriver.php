<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TruckDriver extends Model
{
    use HasFactory;

    public $table = 'truckdriver';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'truck_user_id');
    }

    public function getTruck()
    {
        return $this->belongsTo(Truck::class, 'truck_no_polis');
    }
}
