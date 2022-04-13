<div class="table-responsive offset-lg-1 col-lg-10 col-md-12 mt-3">
    <table class="table table-bordered edittable" id="editTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="10%">Line</th>
                <th>Part</th>
                <th>UM</th>
                <th>Qty Order</th>
                <th>Qty Ship</th>
                <th width="10%">Delete</th>
            </tr>
        </thead>
        <tbody id="edittable">
            @forelse ($data->getDetail as $key => $datas)
            <tr>
                <input type="hidden" name="operation[]" class="operation" value="M">
                <input type="hidden" name="iddetail[]" value="{{$datas->id}}">
                <td><input type="number" class="form-control" value="{{$datas->sod_line}}" name="line[]" readonly></td>
                <td><input type="text" class="form-control" value="{{$datas->sod_part}}" name="part[]" readonly></td>
                <td><input type="text" class="form-control" value="{{$datas->sod_um}}" name="um[]" readonly></td>
                <td><input type="number" class="form-control" value="{{$datas->sod_qty_ord}}" name="qtyord[]" min="{{$datas->sod_qty_ship}}"></td>
                <td><input type="number" class="form-control" value="{{$datas->sod_qty_ship}}" name="qtyship[]" readonly></td>
                <td style="vertical-align:middle;text-align:center;"> 
                    @if($datas->sod_qty_ship != 0)
                        <input type="checkbox" class="qaddel" value="" disabled> 
                    @else
                        <input type="checkbox" class="qaddel" value="Y" name="qaddel[]"> 
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan='8' style="color:red;text-align:center;"> No Data Avail</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8" class="text-center">
                    <span class="btn btn-info bt-action" id="addrow">Add Row</span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>