<div class="table-responsive col-lg-12 col-md-12 mt-3">
    <table class="table table-bordered edittable" id="editTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="5%">Line</th>
                <th width="25%">Part</th>
                <th width="5%">UM</th>
                <th width="10%">Qty Order</th>
                <th width="10%">Qty Open</th>
                <th width="10%">Qty Diakui</th>
                <th width="10%">Tanggal</th>
                <th width="25%">Remarks</th>
            </tr>
        </thead>
        <tbody id="edittable">
            @forelse ($data->getMaster->getDetail as $key => $datas)
            <tr>
                <td>{{$datas->sod_line}}</td>
                <td>{{$datas->sod_part}}</td>
                <td>{{$datas->sod_um}}</td>
                <td>{{$datas->sod_qty_ord}}</td>
                <td>{{number_format($datas->sod_qty_ord - $datas->sod_qty_ship,2)}}</td>
                <td>
                    <input type="hidden" name="iddetail[]" value="{{$datas->id}}">
                    <input type="number" name="qtyakui[]" class="form-control">
                </td>
                <td>
                    <input type="text" name="tglakui[]" class="form-control tglakui" value="{{\Carbon\Carbon::now()->toDateString()}}" >
                </td>
                <td>
                    <input type="text" name="remarks[]" class="form-control">
                </td>
            </tr>
            @empty
            <tr>
                <td colspan='8' style="color:red;text-align:center;"> No Data Avail</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>