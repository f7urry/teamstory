<h1>Consignee</h1>
<hr />
<div class="table-responsive">
    <table class="table table-" id="dataTable" width="100%" cellspacing="0">
        <thead class='thead-dark'>
            <tr>
                <th>Consignee Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_data as $p)
            <tr>
                <td>{{$p->party_name}}</td>
                <td>
                    <a href="#" class='popup-picker btn btn-default' label="<br/> "
                            data-value='{{$p->id}}'
                            data-text='{{$p->party_name}}'>
                        <i class="fa fa-check"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">{{ $list_data->appends(request()->except('page'))->links() }}</div>
</div>