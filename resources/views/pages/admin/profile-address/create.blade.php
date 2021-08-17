@extends("layouts.app")
@section("title","New Address")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/profileaddress')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/profileaddress')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" name="formAdd" id="formAdd">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Customer</label>
                            <input type="text" class="form-control" disabled value="{{$party->party_name}}"/>
                            <input type="hidden" name="party_id" value="{{$party->id}}"/>
                        </div>
                        <div class="form-group">
                            <label>PIC</label>
                            <input type="text" name="pic_name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Province</label>
                            <select name="province_id" id="province" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="city_id" id="city" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"/>
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
            set_product($(this).val());
        });
        $_select("#province",`${base_url()}/api/province/options`,function(){
            $("#city").empty();
            $_select("#city",`${base_url()}/api/city/options?province=${$(this).val()}`);
        });
    });
</script>
@endpush