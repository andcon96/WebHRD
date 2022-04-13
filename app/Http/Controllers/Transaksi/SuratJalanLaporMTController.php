<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Master\Truck;
use App\Models\Master\TruckDriver;
use App\Models\Transaksi\SalesOrderDetail;
use App\Models\Transaksi\SalesOrderSangu;
use App\Models\Transaksi\SOHistTrip;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratJalanLaporMTController extends Controller
{
    public function index(Request $request)
    {
        $data = SalesOrderSangu::query()
            ->with(['getTruckDriver.getTruck', 'getMaster', 'getTruckDriver.getUser']);
        $truck = Truck::get();

        if ($request->truck) {
            $data->whereRelation('getTruckDriver.getTruck', 'id', '=', $request->truck);
            $data = $data->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $data = [];
        }

        return view('transaksi.suratjalan.index', compact('data', 'truck'));
    }

    public function laporsj($so, $truck)
    {
        $truckDriver = TruckDriver::where('truck_no_polis', $truck)->where('truck_is_active', 1)->firstOrFail();
        $idTruckDriver = $truckDriver->id ?? 0;
        $data = SalesOrderSangu::with(['getTruckDriver.getTruck','getMaster.getDetail',
            'countLaporanHist.getTruckDriver.getTruck',
            'countLaporanHist.getTruckDriver.getUser'])
            ->with('countLaporanHist', function ($query) use ($idTruckDriver) {
                $query->where('soh_driver', '=', $idTruckDriver);
            })
            ->where('sos_so_mstr_id', $so)
            ->whereRelation('getTruckDriver.getTruck', 'id', '=', $truck)
            ->firstOrFail();
            
        return view('transaksi.suratjalan.laporsj', compact('data'));
    }

    public function updatesj(Request $request){
        // dd($request->all());
        DB::beginTransaction();
        try{
            $totalship = 0;
            // Save Qty Ship
            foreach($request->iddetail as $keys => $iddetail){
                $sodetail = SalesOrderDetail::findOrFail($iddetail);
                $totalship = $sodetail->sod_qty_ship + $request->qtyakui[$keys];
                
                $sodetail->sod_date = $request->tglakui[$keys];
                $sodetail->sod_qty_ship = $totalship;
                $sodetail->sod_remarks = $request->remarks[$keys];
                $sodetail->save();
            }
            // Save SJ
            foreach($request->idhist as $key => $idhist){
                $sohist = SOHistTrip::findOrFail($idhist);
                $sohist->soh_sj = $request->sj[$key];
                $sohist->save();
            }

            DB::commit();
            alert()->success('Success', 'Surat Jalan Berhasil Disimpan');
            return back();
        }catch(Exception $e){
            DB::rollback();
            alert()->error('Error', 'Save Gagal silahkan dicoba berberapa saat lagi');
            return back();
        }

    }
}
