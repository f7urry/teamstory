@extends("layouts.app")
@section("title","Cart")
@section("content")
<form action="{{url('/cart/checkout')}}" name="form" method="post">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-6 h-100">
            <div class="card">
                <div class="card-body">
                @php($sum=0)
                @foreach($data as $d)
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" name="cart_id[]" value="{{$d->id}}" class="mr-2 cart_id"/>
                            <a href="{{url('/file/view?f=').$d->item->item_image}}" class="lightbox-image" rel="1">
                                <img src="{{url('/file/view?f=').$d->item->item_image}}" width="128px" class="img-thumbnail"/>
                            </a>
                        </div>
                        <div class="col-md-4">
                            {{$d->item->item_name}}<br/>
                            IDR {{number_format($d->price)}}
                            @php($sum+=$d->price*$d->qty)
                        </div>
                        <div class="col-md-3 form-inline">
                            <div class="input-group">
                                <span class="mr-2">x</span>
                                <input type="number" value="{{$d->qty}}" name="qty[]" class="form-control col-lg-4 qty"/>
                                <input type="hidden" value="{{$d->price}}" class="price"/>
                                <div class="input-group-append">
                                    <button class="btn-primary btn btn-calc" type="button">Update</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 form-inline">
                            <a data-id="{{$d->id}}" class="btn btn-link text-danger btn-sm btn-rfc" href="#"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <button class="btn btn-block btn-secondary btn-lg" id="btn-checkout" type="submit" disabled>Make Order</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span class="font-weight-bold">Total</span>
                        </div>
                        <div class="col-6">
                            <span id="total">IDR {{number_format($sum)}}</span>
                            <input type="hidden" name="gtotal" id="gtotal" value="{{$sum}}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span class="font-weight-bold">Shipping To</span>
                        </div>
                        <div class="col-6">1
                            <select name="shipping_address" id="shipping_address" class="form-control" data-height="true"></select>
                            <span id="address" style="font-size:12px"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push("scripts")
<script type="text/javascript">
    $(function(){
        $_select("#shipping_address",base_url()+"/api/address/options?mine=1",function(){
            $.get(base_url()+"/api/address/get/"+$(this).val(),function(data){
                var address=data.pic_name;
                address+="<br/>"+data.email;
                address+="<br/>"+data.phone;
                address+="<br/>"+data.address;
                address+="<br/>"+data.city.location;
                address+="<br/>"+data.province.location;
                address+="<br/>"+data.zip_code;
                $("#address").html(address);
            });
        });
        $(".cart_id").on("click",function(){
            var checked=false;
            var cart_id=$(".cart_id");
            for(let i=0;i<cart_id.length;i++){
                if(cart_id.eq(i).is(":checked"))
                    checked=true;
            }
            if(!checked){
                $("#btn-checkout").attr("disabled",true);
                $("#btn-checkout").removeClass("btn-success");
                $("#btn-checkout").addClass("btn-secondary");
            }else{
                $("#btn-checkout").removeAttr("disabled");
                $("#btn-checkout").removeClass("btn-secondary");
                $("#btn-checkout").addClass("btn-success");
            }
        });
        $(".btn-rfc").on("click",function(){
            var id=$(this).attr("data-id");
            var data={
                _token: csrf_token(),
                _method:"delete"
            };
            $.post(base_url()+"/cart/"+id,data,function(resp){
                location.reload();
            });
        });
        $(".btn-calc").on("click",function(){
            var qty=$(".qty");
            var price=$(".price");
            var total=0;
            for(var i=0;i<qty.length;i++){
                var q=qty.eq(i).val();
                var p=price.eq(i).val();
                total+=q*p;
                console.log(total);
            }
            $("#gtotal").val(total);
            $("#total").text(number_format(total));
        });
    });
</script>
@endpush