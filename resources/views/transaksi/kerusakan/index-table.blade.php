<div class="table-responsive col-lg-12 col-md-12 mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nomor Kerusakan</th>
                <th>Truck</th>
                <th>Driver</th>
                <th>Tanggal Lapor</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $datas)
            <tr>
                <td>{{$datas->kerusakan_nbr}}</td>
                <td>{{$datas->getTruckDriver->getTruck->truck_no_polis}}</td>
                <td>{{$datas->getTruckDriver->getUser->name}}</td>
                <td>{{$datas->kerusakan_date}}</td>
                <td>{{$datas->kerusakan_status}}</td>
                <td>
                    <a href="{{route('laporkerusakan.show',$datas->id) }}"><i class="fas fa-eye"></i></a>
                    @if($datas->kerusakan_status == 'New')
                    <a href="{{route('laporkerusakan.edit',$datas->id) }}"><i class="fas fa-edit"></i></a>
                    
                    <a href="{{route('assignKR',$datas->id) }}"><i class="fas fa-tasks"></i></a>

                    <a href="" class="deleteModal" 
                        data-id="{{$datas->id}}" data-krnbr="{{$datas->kerusakan_nbr}}"
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