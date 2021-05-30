@extends("layouts.print")
@section("title","Print Barcode")
@section("content")
<div class="page-width-a4-landscape m-3">
    <div class="row">
        <div class="col-md-12">
            @foreach ($itemregister->items as $item)
                <table border="1" style="height: 85px;" align="center" class="m-3">
                    <tr>
                        <td align="center">
                            {!!DNS1D::getBarcodeHTML($item->barcode, 'C128')!!}
                            {{$item->barcode}}<br/>
                            {{$item->item->item_alias."/".$item->item->item_name."/".$item->item->uom->code}}
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>
    </div>
</div>
@endsection