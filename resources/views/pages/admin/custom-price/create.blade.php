@extends("layouts.app")
@section("title","Custom Price")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/'.strtolower($party->party_role).'/'.$party->id)}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/customprice')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" class="row" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                         <div class="form-group col-md-12">
                            <label>Customer</label>
                            <input type="text" class="form-control" disabled value="{{$party->party_name}}"/>
                            <input type="hidden" name="party_id" value="{{$party->id}}"/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Item</label>
                            <select name="item_id" id="item"></select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" id="price" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Discount</label>
                            <input type="number" name="discount" class="form-control" id="discount" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Note</label>
                            <input type="text" name="note" class="form-control" id="note" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("scripts")
<script type="text/javascript">
    $(function(){
        $_select("#item",`${base_url()}/api/item/options?stock=1`,function(){
            var prod=$(this).val();
            $.get(`${base_url()}/api/item/get/${prod}`,function(data){
                $("#price").val(data.sell_price);
            });
        });
    });
</script>
@endpush