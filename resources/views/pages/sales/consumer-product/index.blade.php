@extends("layouts.app")
@section("title","Cart")
@section("content")
<div class="row" id="product-row">
    @foreach($data as $d)
     <div class="col-2 m-3">
        <div class='card product-card shadow'>
            <div class='card-body justify-content-center d-flex'>
                <a href="{{url('/file/view?f=').$d->item_image}}" class="lightbox-image" rel="1">
                    <img src="{{url('/file/view?f=').$d->item_image}}" width="128px" class="img-thumbnail"/>
                </a>
            </div>
            <div class="card-footer">
                <div class="row">
                    <span class="col-12">{{$d->item_name}}</span>
                </div>
                <div class="row">
                    <span class="col-12 font-weight-bold">IDR {{number_format($d->sell_price)}}</span>
                </div>
                <div class="row">
                    <span class="col-8 font-weight-italic product-stock">Available: {{$d->current_stock}}</span>
                    <span class="col-4"></span>
                </div>
                <div class="row mt-1">
                    <span class="col-12">
                    <a 
                        data-id="{{$d->id}}" 
                        data-price='{{$d->sell_price}}' 
                        class="btn btn-block btn-success btn-sm btn-atc" href="#"><i class="fa fa-plus"></i> Add to Cart</a></span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $data->links() }}
</div>
@endsection

@push("styles")
<style text="text/css">
    .product-card .card-footer{
        background: #fff;
        border-top: 0px;
    }
    .product-stock{
        font-size: 10px;
    }
</style>
@endpush

@push("scripts")
<script type="text/javascript">
    $(function(){
        $(".btn-atc").click(function(){
            var data={
                _token: csrf_token(),
                item_id: $(this).attr("data-id"),
                price: $(this).attr("data-price")
            };
            $.post(base_url()+"/cart",data,function(resp){
                alert(resp.message);
            });
        });
    });
</script>
@endpush