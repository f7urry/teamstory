@extends("layouts.print")
@section("title","Print Barcode")
@section("content")
<div id="page-wrapper" class="page-width-a4-landscape m-3">
    <div class="row">
        <div class="col-md-4">
            @foreach ($goodsReceipt->goodsReceiptItems as $item)
             <table border="1" width="100%" align="center">
                <tr>
                    <td align="center">
                        {!!DNS1D::getBarcodeHTML($item->barcode, 'C128')!!}
                        {{$item->barcode}}<br/>
                        {{$item->item->item_alias."/".$item->item->item_name."/".$item->item->uom->code}}
                    </td>
                </tr>
            </table>
            <br/>
            @endforeach
        </div>
    </div>
</div>
@endsection