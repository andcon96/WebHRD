<div class="table-responsive col-lg-12 col-md-12 mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sales Order</th>
                <th>Customer</th>
                <th>Due Date</th>
                <th>Ship From</th>
                <th>Ship To</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $datas)
            <tr>
                <td>{{$datas->getMaster->so_nbr}}</td>
                <td>{{$datas->getMaster->so_cust}}</td>
                <td>{{$datas->getMaster->so_ship_to}}</td>
                <td>{{$datas->getMaster->so_ship_from}}</td>
                <td>{{$datas->getMaster->so_due_date}}</td>
                <td>
                    <a href="{{ route('LaporSJ', ['so' => $datas->getMaster->id, 'truck' => $datas->getTruckDriver->getTruck->id]) }}">
                        <i class="fas fa-edit"></i>
                    </a>
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