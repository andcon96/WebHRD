<div class="table-responsive col-lg-12 col-md-12 mt-3">
    <table class="table table-bordered mini-table" id="dataTable" width="100%" cellspacing="0">
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
                <td data-label="SO NUMBER">{{$datas->so_nbr}}</td>
                <td data-label="SO CUSTOMER">{{$datas->so_cust}}</td>
                <td data-label="SO TYPE">{{$datas->so_type}}</td>
                <td data-label="SO SHIP FROM">{{$datas->so_ship_from}}</td>
                <td data-label="SO SHIP TO">{{$datas->so_ship_to}}</td>
                <td data-label="SO DUE DATE">{{$datas->so_due_date}}</td>
                <td data-label="SO STATUS">{{$datas->so_status}}</td>
                <td>
                    <a href="" class="viewModal" data-id="{{$datas->id}}" data-sonbr="{{$datas->so_nbr}}"
                        data-cust="{{$datas->so_cust}}" data-type="{{$datas->so_type}}" 
                        data-shipfrom="{{$datas->so_ship_from}}" data-shipto="{{$datas->so_ship_to}}" 
                        data-duedate="{{$datas->so_due_date}}" 
                        data-toggle='modal' data-target="#myModal"><i
                        class="fas fa-eye"></i></button>
                        
                    @if($datas->new_so)
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