<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SalesOrderMstr extends Model
{
    use HasFactory;

    public $table = 'so_mstr';

    protected $fillable = ['user_id'];

    public function getDetail()
    {
        return $this->hasMany(SalesOrderDetail::class, 'sod_so_mstr_id');
    }

    public function getSangu()
    {
        return $this->hasMany(SalesOrderSangu::class, 'sos_so_mstr_id');
    }

    protected static function boot()
    {
        parent::boot();
        
        self::creating(function($model){
            $model->user_id = Auth()->user()->id;
        });

        self::addGlobalScope(function(Builder $builder){
            // $builder->where('user_id', '=', Auth()->user()->id);
            $builder->where('so_domain', Session::get('domain'));
        });
    }
}
