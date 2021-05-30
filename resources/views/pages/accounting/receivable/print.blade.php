@extends("layouts.print")
@section("title","Print Kwitansi")
@section("content")
<div id="page-wrapper">
    <div class="page">
        <table width="100%" border="0" cellpadding="4" cellspacing="0" class="table table-sm border-dark">
            <tr>
                <td>@include("pages.general.report.header")</td>
                <td align="center"><h2>KWITANSI</h2></td>
                <td align="right">
                    <table class="table-borderless">
                        <tr><td>Tgl.Angsuran</td><td>: {{DateHelper::format($rec->date)}}</td></tr>
                        <tr><td>No.Faktur</td><td>: {{$rec->code}}</td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="center">
                    <table class="table-borderless">
                        <tr><td>Telah terima dari</td><td>: {{$rec->salesorder->party->party_name}}</td></tr>
                        <tr><td>Sejumlah uang</td><td>: {{number_format($rec->amount)}}</td></tr>
                    </table>
                </td>
                <td valign="center" colspan="2">
                    <br/>
                    <span class="border p-2">{{NumberHelper::terbilang($rec->amount)}} Rupiah</span>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="0" class="table table-sm table-borderless">
            <thead class="border-bottom border-top border-dark">
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Angsuran Ke {{$rec->current_tenor}}</td>
                    <td align='right'>Rp{{number_format($rec->amount)}}</td>
                </tr>
                @for($i=0;$i<12;$i++)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endfor
            </tbody>
            <tfoot class="border-top border-dark">
                <tr>
                    <th colspan="2">TOTAL:</th>
                    <th class="text-right" align="right">Rp{{number_format($rec->amount)}}</th>
                </tr>
            </tfoot>
        </table>
        <table width="100%" border="0" cellpadding="4" cellspacing="0" class="table table-sm table-bordered">
            <tr>
                <td>
                    <table class="table table-borderless">
                        <tr><td>Pokok Hutang</td><td>: Rp{{number_format($rec->salesorder->sell_price-$rec->salesorder->prepayment_amount)}}</td></tr>
                        <tr><td>Total Angsuran</td><td>: Rp{{number_format($rec->current_payment)}}</td></tr>
                        <tr><td>Sisa Hutang</td><td>: Rp{{number_format($rec->current_unpaid)}}</td></tr>
                        <tr><td>Status</td><td>: {{$rec->current_status=="PAID"?"Lunas":"Belum Lunas"}}</td></tr>
                        <tr><td>Jatuh Tempo</td><td>: {{date("d-m-Y",strtotime($rec->salesorder->date."+".$rec->current_tenor." month"))}}</td></tr>
                    </table>
                </td>
                <td class="border-left">Perhatian:<br/>{{$rec->note}}</td>
                <td align="center">Purwakarta, {{date('d-m-Y')}}<br/><br/><br/></td>
            </tr>
        </table>
    </div>
</div>
@endsection