@extends("layouts.app")
@section("title","Pelanggan")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('customer.create')}}" id="btn_save"><i class="fa fa-plus"></i> New</a></li>
    </ol>
    <div class="table-responsive">
        <table class="table table-bordered" id="dtable" width="100%" cellspacing="0">
            <thead class='thead-dark'>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push("scripts")
<script type="text/javascript">
    $(document).ready(function(){
         var dTable=$("#dtable").DataTable({
             searching: true,
             processing: true,
             serverSide: true,
             ajax: `${base_url()}/api/customer/list`,
             columns: [
                {
                    data: 'party_name',
                    name: 'party_name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'action',
                    render:function(data,type,row){
                        var data=$(data);
                        var trx=0;
                        $.ajax({
                            async: false,
                            url: base_url()+"/api/party/get-trx/"+row['id'],
                            dataType: "json",
                            success: function(data){
                                trx=data.total;
                            }
                        });
                        if(trx>0)
                            $(data).find(".action-delete").empty();
                        return data.html();
                    }
                }
             ],
             drawCallback:function(){
                $_ui();
             }
         });
    });
</script>
@endpush