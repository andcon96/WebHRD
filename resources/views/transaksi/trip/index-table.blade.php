<div class="table-responsive col-lg-12 col-md-12 mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Sales Order</th>
                <th>Customer</th>
                <th>Type</th>
                <th>Ship To</th>
                <th>Due Date</th>
                <th>Total Sangu</th>
                <th>Total Trip</th>
                <th>Trip Dilaporkan</th>
                <th>Surat Jalan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $datas)
                <tr>
                    <td>{{$datas->getMaster->so_nbr}}</td>
                    <td>{{$datas->getMaster->so_cust}}</td>
                    <td>{{$datas->getMaster->so_type}}</td>
                    <td>{{$datas->getMaster->so_ship_to}}</td>
                    <td>{{$datas->getMaster->so_due_date}}</td>
                    <td>{{$datas->sos_sangu}}</td>
                    <td>{{$datas->sos_tot_trip}}</td>
                    <td>{{$datas->countLaporanHist->count()}}</td>
                    <td></td>
                </tr>
            @empty
            <tr>
                <td colspan='8' style="color:red;text-align:center;"> No Data Avail</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>