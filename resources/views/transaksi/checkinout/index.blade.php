@extends('layout.layout')

@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Transaksi</a></li>
    <li class="breadcrumb-item active">Check In Out</li>
</ol>
@endsection


@section('content')

<form action="" method="GET">
    <div class="form-group row">
        <label for="polis" class="col-form-label text-md-right" style="margin-left:25px">{{ __('Truck') }}</label>
        <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12 col-xs-12">
            @if($truckDriver)
            <input type="text" name="polis" class="form-control" value="{{$truckDriver->getTruck->truck_no_polis ?? ''}}" readonly>
            @else
            <select name="polis" id="polis" class="form-control polis">
                <option value="">Select Data</option>
                @foreach($truck as $trucks)
                <option value="{{$trucks->id}}">{{$trucks->truck_no_polis}}</option>
                @endforeach
            </select>
            @endif
        </div>
        <div class="offset-md-3 offset-lg-0 offset-xl-0 offset-sm-0 offset-xs-0" id='btn'>
            @if(!$truckDriver)
            <input type="submit" class="btn bt-ref" id="btnsearch" value="Search" style="margin-left:15px;" />
            @else
            <a href="" class="editUser btn bt-ref" data-toggle="modal" data-target="#editModal">Check In / Out</a>
            @endif
        </div>
    </div>
</form>

@include('transaksi.checkinout.index-table')


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Check In / Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('checkinout.store')}}" method="post">

        {{ method_field('POST') }}
        {{ csrf_field() }}

        <input type="hidden" name="truckdriver" id="truckdriver" value="{{$truckDriver->id ?? ''}}">

        <div class="modal-body">
            Check In / Check Out Truck ?
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-info bt-action" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success bt-action">Save</button>
        </div>

      </form>

    </div>
  </div>
</div>

@endsection


@section('scripts')
<script>
    $('.polis').select2({
        width: '100%',
    });

    $(document).ready(function() {
        var cur_url = window.location.href;

        let paramString = cur_url.split('?')[1];
        let queryString = new URLSearchParams(paramString);

        let truck = queryString.get('polis');

        $('#polis').val(truck).trigger('change');
    });
</script>
@endsection