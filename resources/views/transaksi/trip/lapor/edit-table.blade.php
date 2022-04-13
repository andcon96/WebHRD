<div class="table-responsive offset-lg-1 col-lg-10 col-md-12 mt-3">
    <table class="table table-bordered edittable" id="editTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="10%">Line</th>
                <th>Part</th>
                <th width="10%">UM</th>
                <th width="20%">Qty Order</th>
            </tr>
        </thead>
        <tbody id="edittable">
            @forelse ($data->getDetail as $key => $datas)
            <tr>
                <input type="hidden" class="operation" value="M">
                <input type="hidden" value="{{$datas->id}}">
                <td><input type="number" class="form-control" value="{{$datas->sod_line}}" readonly></td>
                <td><input type="text" class="form-control" value="{{$datas->sod_part}}" readonly></td>
                <td><input type="text" class="form-control" value="{{$datas->sod_um}}" readonly></td>
                <td><input type="number" class="form-control" value="{{$datas->sod_qty_ord}}" min="{{$datas->sod_qty_ship}}" readonly></td>
            </tr>
            @empty
            <tr>
                <td colspan='8' style="color:red;text-align:center;"> No Data Avail</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>