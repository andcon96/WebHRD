@extends('layout.layout')

@section('menu_name', 'Department Maintenance')
@section('breadcrumbs')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Master</a></li>
    <li class="breadcrumb-item active">Department Maintenance</li>
</ol>
@endsection

@section('content')

<!-- page heading -->
<div class="col-md-12 col-lg-8 offset-lg-2 mb-4">
    <form action="{{route('customermaint.store', 'create')}}}" method="POST">
        {{ method_field('post') }}
        {{ csrf_field() }}
        <input type="submit" class="btn bt-action" data-toggle="modal" data-target="#loadingtable" data-backdrop="static" data-keyboard="false" id="btnrefresh" value="Load Table" />
    </form>
</div>

<div class="table-responsive col-lg-8 offset-lg-2 col-md-12">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="20%">Customer Code</th>
                <th>Customer Desc</th>
                <th width="15%">Site</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cust as $show)
            <tr>
                <td>{{$show->cust_code}}</td>
                <td>{{$show->cust_desc}}</td>
                <td>{{$show->cust_site}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="10" style="text-align:center;color:red">No Data Available</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


<div class="modal fade" id="loadingtable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="spinner-grow text-danger"></div>
        <div class="spinner-grow text-warning" style="animation-delay:0.2s;"></div>
        <div class="spinner-grow text-success" style="animation-delay:0.45s;"></div>
        <div class="spinner-grow text-info" style="animation-delay:0.65s;"></div>
        <div class="spinner-grow text-primary" style="animation-delay:0.85s;"></div>
    </div>
</div>
@endsection