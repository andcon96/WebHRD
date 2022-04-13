<div class="table-responsive col-lg-12 col-md-12 mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nomor SO</th>
                <th>Customer</th>
                <th>Total Sangu</th>
                <th>Ship To</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php($totalsangu = 0)
            @forelse ($data as $key => $datas)
            @php($totalsangu += $datas->getSangu[0]->sos_sangu)
            <tr>
                <td>{{$datas->so_nbr}}</td>
                <td>{{$datas->so_cust}}</td>
                <td>{{number_format($datas->getSangu[0]->sos_sangu,0)}}</td>
                <td>{{$datas->so_ship_to}}</td>
                <td>{{$datas->so_status}}</td>
                <td>{{$datas->so_due_date}}</td>
                <td>
                    <a href="{{route('laportrip.edit',$datas->id) }}">
                        <i class="fas fa-sticky-note"></i>
                    </a>
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
                <td colspan="2"><b>Total Sangu</b></td>
                <td><b>{{ number_format($totalsangu,0) }}</b></td>
                <td colspan="5"></td>
            </tr>
        </tfoot>
    </table>
</div>