<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Customer;
use App\Services\WSAServices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust = Customer::get();

        return view('setting.customer.index',['cust' => $cust]);
    }

    public function store()
    {
        DB::beginTransaction();
        try{
            $loadcust = (new WSAServices())->wsacust();
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

}
