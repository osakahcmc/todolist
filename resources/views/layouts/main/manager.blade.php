<div class="manager_work">
    <div class="format_group">
        <form method="post" action="{{route('change')}}">
            {{csrf_field()}}
            <a class="btn btn-primary mx-1 my-1 ButtonEdit text-white" onclick="ChangeStatus()">Edit Select</a>
            <button class="btn btn-primary mx-1 my-1 ButtonEdit">Submit</button>
            <input id="GetValueEdit" name="work_name_edit" value="">
        </form>
        <form method="post" action="{{route('delete')}}">
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger mx-1 my-1">Work Delete</button>
            <input id="GetValueDelete" name="work_name_delete" value="">
        </form>
    </div>
    <div class="table_work_form">
        <table>
            <tr class="table_title">
                <td><input type="checkbox" class="CheckAll" onclick="CheckAll()"></td>
                <td>Work Name</td>
                <td>Starting Date</td>
                <td>End Date</td>
                <td>Status</td>
                    <td>Created Date</td>
            </tr>
            @foreach($works as $works_info)
                <tr>
                    <th><input type="checkbox" class="CheckOne" onclick="CheckOne()" value="{{ $works_info->work_name }}"></th>
                    <th class="work_name">{{ $works_info->work_name }}</th>
                    <th class="date starting_date" id="starting_date">{{\Carbon\Carbon::parse($works_info->starting_date)->format('d-m-Y')}}</th>
                    <th class="date ending_date" id="ending_date">{{\Carbon\Carbon::parse($works_info->ending_date)->format('d-m-Y')}}</th>
                    <th class="status"><select class="EditStatus" disabled onclick="ChooseStatus()">
                            <option @if($works_info->status === '0'){{'selected'}}@endif>{{'Planing'}}</option>
                            <option @if($works_info->status === '1'){{'selected'}}@endif>{{'Doing'}}</option>
                            <option @if($works_info->status === '2'){{'selected'}}@endif>{{'Complete'}}</option>
                        </select></th>
                    <th class="date_time">{{\Carbon\Carbon::parse($works_info->created_at)->format('h:s d-m-Y')}}</th>
                </tr>
                @endforeach
        </table>
        <div class="paginate_table my-3">
            {{$works->appends(array('sort' => 'work_name'))->links("pagination::default")}}
        </div>
    </div>
</div>
<script src="{{ url('/assets/js/checkbox.js') }}"></script>
