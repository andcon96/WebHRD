@extends('layout.layout')

@section('menu_name','Sales Order Maintenance')
@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Master</a></li>
    <li class="breadcrumb-item active">Pelaporan Trip</li>
</ol>
@endsection

@section('content')
<form action="{{ route('updateSJ') }}" method="POST" id="submit">
    @method('POST')
    @csrf
    <div class="row">
        <div class="form-group row col-md-12">
            <label for="sonbr" class="col-md-2 col-form-label text-md-right">Nomor SO</label>
            <div class="col-md-3">
                <input id="sonbr" type="text" class="form-control" name="sonbr" value="{{$data->getMaster->so_nbr}}" autocomplete="off" maxlength="24" autofocus readonly>
            </div>
            <label for="customer" class="col-md-3 col-form-label text-md-right">Customer</label>
            <div class="col-md-3">
                <input id="customer" type="text" class="form-control" name="customer" value="{{$data->getMaster->so_cust}}" autocomplete="off" maxlength="24" autofocus readonly>
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="shipfrom" class="col-md-2 col-form-label text-md-right">Ship From</label>
            <div class="col-md-3">
                <input id="shipfrom" type="text" class="form-control" name="shipfrom" value="{{$data->getMaster->so_ship_from}}" autocomplete="off" maxlength="24" autofocus readonly>
            </div>
            <label for="shipto" class="col-md-3 col-form-label text-md-right">Ship To</label>
            <div class="col-md-3">
                <input id="shipto" type="text" class="form-control" name="shipto" value="{{$data->getMaster->so_ship_to}}" autocomplete="off" maxlength="24" autofocus readonly>
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="duedate" class="col-md-2 col-form-label text-md-right">Due Date</label>
            <div class="col-md-3">
                <input id="duedate" type="text" class="form-control" name="duedate" value="{{$data->getMaster->so_due_date}}" autocomplete="off" maxlength="24" autofocus disabled>
            </div>
            <label for="type" class="col-md-3 col-form-label text-md-right">Type</label>
            <div class="col-md-3">
                <input id="type" type="text" class="form-control" name="type" value="{{$data->getMaster->so_type}}" autocomplete="off" maxlength="24" autofocus readonly>
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="effdate" class="col-md-2 col-form-label text-md-right">Eff Date</label>
            <div class="col-md-3">
                <input id="effdate" type="text" class="form-control" name="effdate" value="{{\Carbon\Carbon::now()->toDateString()}}" autocomplete="off" maxlength="24" autofocus>
            </div>
        </div>
        <div class="form-group row col-md-12">
            <label for="remark" class="col-md-2 col-form-label text-md-right">Remark</label>
            <div class="col-md-9">
                <input id="remark" type="text" class="form-control" name="remark" value="" autocomplete="off" autofocus>
            </div>
        </div>

        <div class="form-group row col-md-12">
            @include('transaksi.suratjalan.laporsj-table-detail')
        </div>
        <div class="form-group row col-md-12">
            <div class="offset-md-1 col-md-10" style="margin-top:90px;">
                <div class="float-right">
                    <a href="{{ route('laporsj.index') }}" id="btnback" class="btn btn-success bt-action">Back</a>
                    <button type="submit" class="btn btn-success bt-action btn-focus btnconf" id="btnconf">Confirm Shipment</button>
                    <button type="button" class="btn bt-action" id="btnloading" style="display:none">
                        <i class="fa fa-circle-o-notch fa-spin"></i> &nbsp;Loading
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


@section('scripts')
<script>
    $("#duedate").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: '+0d',
        onClose: function() {
            $("#addrow").focus();
        }
    });
    $("#effdate").datepicker({
        dateFormat: 'yy-mm-dd',
    });

    $(document).on('submit', '#submit', function(e) {
        document.getElementById('btnconf').style.display = 'none';
        document.getElementById('btnback').style.display = 'none';
        document.getElementById('btnloading').style.display = '';
    });

    $(document).on('click', '.btnconf', function(e){
        e.preventDefault();
        Swal.fire({
            title: "Lapor Surat Jalan ?",
            text: "Pastikan Data Sudah Sesuai",
            type: "warning",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Lapor",
            closeOnConfirm: false
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $('#submit').submit();
            }
        })
    });
</script>
@endsection