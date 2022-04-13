<div class="table-responsive col-lg-12 col-md-12 mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nomor SO</th>
                <th>Customer</th>
                <th>Type</th>
                <th>Ship-From</th>
                <th>Ship-To</th>
                <th>Due Date</th>
                <th>Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $datas)
            <tr>
                <td>{{$datas->so_nbr}}</td>
                <td>{{$datas->so_cust}}</td>
                <td>{{$datas->so_type}}</td>
                <td>{{$datas->so_ship_from}}</td>
                <td>{{$datas->so_ship_to}}</td>
                <td>{{$datas->so_due_date}}</td>
                <td>{{$datas->so_status}}</td>
                <td>
                    <a href="" class="viewModal" data-id="{{$datas->id}}" data-sonbr="{{$datas->so_nbr}}"
                        data-cust="{{$datas->so_cust}}" data-type="{{$datas->so_type}}" 
                        data-shipfrom="{{$datas->so_ship_from}}" data-shipto="{{$datas->so_ship_to}}" 
                        data-duedate="{{$datas->so_due_date}}" 
                        data-toggle='modal' data-target="#myModal"><i
                        class="fas fa-eye"></i></button>
                    @if($datas->so_status == 'New')
                    <a href="{{route('salesorder.edit',$datas->id) }}"><i class="fas fa-edit"></i></a>

                    <a href="" class="deleteModal" 
                        data-id="{{$datas->id}}" data-sonbr="{{$datas->so_nbr}}"
                        data-toggle='modal' data-target="#deleteModal"><i class="fas fa-trash"></i></a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan='8' style="color:red;text-align:center;"> No Data Avail</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$data->withQueryString()->links()}}
</div>