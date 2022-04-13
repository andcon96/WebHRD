<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderMstr extends Model
{
    use HasFactory;

    public $table = 'so_mstr';

    public function getDetail()
    {
        return $this->hasMany(SalesOrderDetail::class, 'sod_so_mstr_id');
    }

    public function getSangu()
    {
        return $this->hasMany(SalesOrderSangu::class, 'sos_so_mstr_id');
    }

}
