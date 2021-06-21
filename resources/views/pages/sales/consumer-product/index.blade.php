@extends("layouts.app")
@section("title","Explore")
@section("content")
<div class="breadcrumb">
    <div class="row">
        <div class="col-md-12">
            <div class=" input-group">
                <input type="text" name="search" class="form-control" placeholder="search product here" id="filter-box"/>
                <div class="input-group-append">
                    <button class="btn btn-primary" id="btn-filter"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row" id="product-row"></div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                Total Product (<span class="total_item"></span>)
            </div>
            <div class="col-md-6 justify-content-end d-flex">
                <div class="btn-toolbar" role="toolbar">
                    <div class='btn-group paging-link' role="group"></div>
                </div>
            </div>
        </div>
    </div>
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
        $("#btn-filter").on('click',function(){
            filter_table(base_url()+"/api/explore/list?page=1");
        });
        filter_table(base_url()+"/api/explore/list?page=1");
        function filter_table(url){
            var filter_value=$("#filter-box").val();
            $.get(url+"&filter="+filter_value,function(resp){
                $(".paging-link").empty();
                $("#product-row").empty();
                $(".total_item").text(resp.from+" - "+resp.to+" of "+resp.total);
                for(var i=0;i<resp.links.length;i++){
                    var d=resp.links[i];
                    var e=`
                        <a class="btn ${d.active?"btn-primary":"btn-default"} btn-paging" href="#" data-href="${d.url}">
                            ${d.label}
                        </a>
                    `;
                    $(".paging-link").append(e);
                    $(".btn-paging").on("click",function(){
                        var url=$(this).attr("data-href");
                        if(url!="null")
                            filter_table(url);
                    });
                }
                for(var i=0;i<resp.data.length;i++){
                    var d=resp.data[i];
                    var e=`
                        <div class="col-md-2 m-3">
                            <div class='card product-card shadow'>
                                <div class='card-body justify-content-center'>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="${base_url()+"/file/view?f="+d.item_image}" class="lightbox-image" rel="1">
                                                <img src="${base_url()+"/file/view?f="+d.item_image}" width="128px" class="img-thumbnail"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <span class="col-12">${d.item_name}</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-12 font-weight-bold">IDR ${number_format(d.sell_price)}</span>
                                    </div>
                                    <div class="row">
                                        <span class="col-8 font-weight-italic product-stock">Available: ${d.current_stock}</span>
                                        <span class="col-4"></span>
                                    </div>
                                    <div class="row mt-1">
                                        <span class="col-12">
                                        <a 
                                            data-id="${d.id}" 
                                            data-price='${d.sell_price}' 
                                            class="btn btn-block btn-success btn-sm btn-atc" href="#"><i class="fa fa-plus"></i> Add to Cart</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    $("#product-row").append(e);
                }
            });
        }
    });
</script>
@endpush