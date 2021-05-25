<h1>JDE Vendor</h1>
<hr />
<form id="vendor-popup" class="row">
    <div class="col-6">
        <div class="form-group">
            <label>Vendor Code:</label>
            <input type="text" name="vendor_code" id="vendor_code" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Vendor Name:</label>
            <div class="input-group">
                <input type="text" name="vendor_name" id="vendor_name" class="form-control"/>
            </div>
        </div>
        <button class="btn btn-info" type="button" id="btn-lookup"><i class="fa fa-search"></i> Search Vendor</button>
    </div>
</form>
<br/>
<div class="table-responsive">
    <table class="table table-striped" id="popup-table" width="100%" cellspacing="0">
        <thead class='thead-dark'>
            <tr>
                <th>Vendor Code</th>
                <th>Vendor Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $("#btn-lookup").click(function(){
        preload=new Preloader();
        $("body").prepend(preload.html);
        $("#popup-table tbody tr").remove();
        var $data={
            "_token":csrf_token(),
            "vendor_name":$("#vendor_name").val(),
            "vendor_code":$("#vendor_code").val()
        }
        $.post(base_url()+"/users/popupjde?",$data,function(resp){
            $.each(resp.data,function(i,e){
                var el=`<tr>
                            <td>${e.F0101_AN8}</td>
                            <td>${e.F0101_ALPH}</td>
                            <td>
                                <a href="#" class='popup-picker btn btn-default'
                                        data-value='${e.F0101_AN8}'
                                        data-text='${e.F0101_ALPH}'>
                                    <i class="fa fa-check"></i>
                                </a>
                            </td>
                        </tr>`;
                $("#popup-table tbody").append(el);
            });
            preload.remove();
        });
    });
</script>