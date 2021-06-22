<div class="form-group">
    <label>Identity Number</label>
    <input type="text" name="identity_number" class="form-control"/>
</div>
<div class="form-group">
    <label>Name</label>
    <input type="text" name="party_name" class="form-control"/>
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
    <label>Phone/Mobile</label>
    <input type="text" name="phone" class="form-control"/>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control"/>
</div>
<!-- <div class="form-group">
    <label>Birth Info</label>
    <div class="form-row">
        <div class="form-group col-5">
            <input type="text" name="pob" class="form-control" placeholder="Place"/>
        </div>
        <div class="form-group col-7">
            <input type="text" name="dob" class="form-control datepicker" placeholder="Date"/>
        </div>
    </div>
</div> -->
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