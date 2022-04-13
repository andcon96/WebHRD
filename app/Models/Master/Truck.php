<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    public $table = 'truck';

    public function getTruckDriver()
    {
        return $this->hasMany(TruckDriver::class, 'truck_no_polis');
    }
}
