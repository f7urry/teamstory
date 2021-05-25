@extends("layouts.print")
@section("title","Print Barcode")
@section("content")
<div class="page-width-a4-landscape m-3">
    <div class="row">
        @for($i=0;$i<8;$i++)
        <div class="col-md-3 mt-3">
             <table border="1" width="100%" align="center">
                <tr>
                    <td align="center">
                        {!!DNS2D::getBarcodeSVG($vehicle->unique_code , 'QRCODE',8,8)!!}
                        <br/>
                        <h3>{{$vehicle->code}}</h3>
                    </td>
                </tr>
            </table>
        </div>
        @endfor
    </div>
</div>
@endsection