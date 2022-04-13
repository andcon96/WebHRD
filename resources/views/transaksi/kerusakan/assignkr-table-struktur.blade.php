<div class="table-responsive offset-lg-3 col-lg-6 col-md-12 mt-3">
    <table class="table table-bordered edittable" id="editTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="60%">Mekanik</th>
                <th width="40%">User</th>
            </tr>
        </thead>
        <tbody id="edittable">
            @forelse ($data->getMekanik as $keys => $datas)
            <tr>
                <td>{{$datas->getStruktur->slk_desc}}</td>
                <td>
                    <input type="hidden" name="mekanik_id[]" value="{{$datas->getStruktur->id}}">
                    <input type="text" class="form-control" name="mekanik_desc[]" value="{{$datas->kerusakan_mekanik}}">
                </td>
            </tr>
            @empty
                @forelse ($struktur as $key => $datas)
                <tr>
                    <td>
                        {{$datas->slk_desc}}
                    </td>
                    <td>
                        <input type="hidden" name="mekanik_id[]" value="{{$datas->id}}">
                        <input type="text" class="form-control" name="mekanik_desc[]">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan='8' style="color:red;text-align:center;"> No Data Avail</td>
                </tr>
                @endforelse
            @endforelse

        </tbody>
    </table>
</div>