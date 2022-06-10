<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Customer;
use App\Models\Master\CustomerShipTo;
use App\Services\WSAServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerShipToController extends Controller
{
    public function index(){
        $data = CustomerShipTo::get();

        $listcust = Customer::get();

        return view('setting.customer.shipto.index',compact('data','listcust'));
    }

    public function store()
    {
        DB::beginTransaction();
        try{
            
            $loadcust = (new WSAServices())->wsacustship();
            if($loadcust === false){
                alert()->error('Error', 'No Data from QAD');
                DB::rollback();
                return back();
            }

            alert()->success('Success', 'Customer Data Loaded');
            DB::commit();
            return back();
        }catch(Exception $err){
            alert()->error('Error', 'WSA Failed');
            DB::rollback();
            return back();
        }
    }
}
