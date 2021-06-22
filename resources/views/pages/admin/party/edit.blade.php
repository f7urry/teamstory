<div class="form-group">
    <label>Identity Number</label>
    <input type="text" name="identity_number" class="form-control" value="{{$party->identity_number}}"/>
</div>
<div class="form-group">
    <label>Name</label>
    <input type="text" name="party_name" class="form-control" value="{{$party->party_name}}"/>
</div>
<div class="form-group">
    <label>PIC</label>
    <input type="text" name="pic_name" class="form-control" value="{{$party->address->pic_name}}" disabled/>
</div>
<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control" value="{{$party->address->address}}" disabled/>
</div>
<div class="form-group">
    <label>Province</label>
    <input type="text" name="country" class="form-control" value="{{$party->address->province->location}}" disabled/>
</div>
<div class="form-group">
    <label>City</label>
    <input type="text" name="city" class="form-control" value="{{$party->address->city->location}}" disabled/>
</div>
<div class="form-group">
    <label>Zip Code</label>
    <input type="text" name="zip_code" class="form-control" value="{{$party->address->zip_code}}" disabled/>
</div>
<div class="form-group">
    <label>Phone/Mobile</label>
    <input type="text" name="phone" class="form-control" value="{{$party->address->phone}}" disabled/>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" value="{{$party->address->email}}" disabled/>
</div>
<!-- <div class="form-group">
    <label>Birth Info</label>
    <div class="form-row">
        <div class="form-group col-6">
            <input type="text" name="pob" class="form-control" placeholder="Place" value="{{$party->pob}}"/>
        </div>
        <div class="form-group col-6">
            <input type="text" name="dob" class="form-control datepicker" placeholder="Date" value="{{$party->dob}}"/>
        </div>
    </div>
</div> -->