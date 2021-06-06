@extends("layouts.app")
@section("title","Sales Order")
@section("content")
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/salesorder')}}"><i class="fa fa-arrow-left"></i> Back</a></li>
        <li class="breadcrumb-item"><a href="#" class="btn-save" data-form="#formAdd" data-action="{{url('/salesorder')}}"><i class="fa fa-check"></i> Save</a></li>
    </ol>
    <form method="post" name="formAdd" id="formAdd">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label>Customer</label>
                            <select name="party_id" id="party_id" class="form-control"></select>
                        </div>
                    </div>
                </div><br/>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label>Shipping Address</label>
                            <select name="shipping_address" id="shipping_address" class="form-control"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label>Invoice Date</label>
                            <input type="text" name="date" class="form-control datepicker" id="date" value="{{date('Y-m-d')}}" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Invoice Due Date</label>
                            <input type="text" name="due_date" class="form-control datepicker" id="due_date" value="{{date('Y-m-d')}}" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Reference</label>
                            <input type="text" name="reference" class="form-control" id="reference" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Notes</label>
                            <input type="text" name="note" class="form-control" id="notes" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <label>Currency</label>
                            <input type="text" name="currency" class="form-control" id="currency" value="IDR" readonly/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Shipping Cost</label>
                            <input type="text" class="form-control" name="shipping_cost" id="shipping_cost" value="0" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Subtotal</label>
                            <input type="text" class="form-control" name="subtotal" id="subtotal" value="0" readonly />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Tax(10%)</label>
                            <input type="text" class="form-control" name="tax" id="tax" value="0" readonly/>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Grand Total</label>
                            <input type="text" class="form-control" name="gtotal" id="gtotal" value="0" readonly/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group col-md-12 table-responsive">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <select name="scan_barcode" id="scan_barcode" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-row">
                                <table class="table table-bordered mt-2" id="dtable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th width="25%">Item</th>
                                            <th>Quantity</th>
                                            <th>Free Qty</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
    $_select("#scan_barcode",base_url()+'/api/item/options',function(){
        $.get(`${base_url()}/api/item/get/${$(this).val()}`,function(data){
            $("#scan_barcode").empty();
            $("#scan_barcode").focus();
            add_item(data);
        });
    });
    $_select("#party_id",base_url()+'/api/party/options?role=customer',function(){
        set_party($(this).val());
        $_select("#shipping_address",base_url()+'/api/address/options?party='+$(this).val());
    });
    $("#shipping_cost").on("keyup",function(e){
        calc();
    });

    function calc(){
        var qty=$(".quantity");
        var price=$(".price");
        var discount=$(".discount");
        var total=$(".total");
        
        var gtotal=0;
        for(var i=0;i<qty.length;i++){
            var q=qty.eq(i).val();
            var p=price.eq(i).val();
            var d=discount.eq(i).val();
            var t=q*p;
            t=t-(t*d/100);
            total.eq(i).val(t);
            
            gtotal+=t;
        }
        var shipping=$("#shipping_cost").val(); 
        gtotal+=parseInt(shipping);
        $("#subtotal").val(gtotal);
        $("#tax").val(gtotal*0.1);
        $("#gtotal").val(gtotal+(gtotal*0.1));
    }
    function set_party(id){
    	$.get(`${base_url()}/api/party/get/${id}`,function(data){
            var address=data.address.address+", "+data.address.city+", "+data.address.region+", "+data.address.country+", "+data.address.zip_code;
            $("#pic").text(data.address.pic_name);
            $("#address").html(address);
            $("#phone").text(data.address.phone);
            $("#email").text(data.address.email);
        });
    }

    var index = 0;
    function add_item(item){
        if($("#party_id").val()==null){
            alert("Customer can't empty");
        }else{
            $.get(`${base_url()}/api/customprice/get/${$("#party_id").val()}/${item.id}`,function(data){
                var el='';
                if (data.price!=null) {
                    el=`
                    <tr>
                        <td>
                            <input type="hidden" name="custom_price_id[]" value="${data.id}"/>
                            <input type="hidden" name="item_id[]" value="${item.id}"/>
                            <span id="item${index}">${item.code} - ${item.item_name}</span>
                        </td>
                        <td>
                            <input type="number" name="quantity[]" class="calc quantity form-control col-md-12" value="0"/>
                        </td>
                        <td>
                            <input type="number" name="free_qty[]" class="calc form-control col-md-12" value="0"/>
                        </td>
                        <td>
                            <input type="number" name="price[]" class="calc price form-control col-md-12" value="${data.price}" readonly/>
                        </td>
                        <td>
                            <input type="number" name="discount[]" class="calc discount form-control col-md-12" value="${data.discount}" readonly/>
                        </td>
                        <td>
                            <input type="number" name="total[]" class="total form-control col-md-12" value="0" readonly/>
                        </td>
                        <td>
                            <button type="button" class='btn btn-danger btn-remove-row'><i class='fa fa-times'></i></button>
                        </td>
                    </tr>`;
                }else{
                    el=`
                    <tr>
                        <td>
                            <input type="hidden" name="custom_price_id[]" value="0"/>
                            <input type="hidden" name="item_id[]" value="${item.id}"/>
                            <span id="item${index}">${item.code} - ${item.item_name}</span>
                        </td>
                        <td>
                            <input type="number" name="quantity[]" class="calc quantity form-control col-md-12" value="0"/>
                        </td>
                        <td>
                            <input type="number" name="free_qty[]" class="calc form-control col-md-12" value="0"/>
                        </td>
                        <td>
                            <input type="number" name="price[]" class="calc price form-control col-md-12" value="0"/>
                        </td>
                        <td>
                            <input type="number" name="discount[]" class="calc discount form-control col-md-12" value="0"/>
                        </td>
                        <td>
                            <input type="number" name="total[]" class="total form-control col-md-12" value="0" readonly/>
                        </td>
                        <td>
                            <button type="button" class='btn btn-danger btn-remove-row'><i class='fa fa-times'></i></button>
                        </td>
                    </tr>`;
                }
                $("#dtable tbody").append(el);
                index++;
                $(".calc").off();
                $(".calc").on("keyup",function(){calc()});
                $_ui();
            });
        }
    }
</script>
@endpush