<div class="form-group">
    <label>Identity Number</label>
    <input type="text" name="identity_number" class="form-control" value="{{$party->identity_number}}"/>
</div>
<div class="form-group">
    <label>Name</label>
    <input type="text" name="party_name" class="form-control" value="{{$party->party_name}}"/>
</div>
<div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control" value="{{$party->address->address}}"/>
</div>
<div class="form-group">
    <label>City</label>
    <input type="text" name="city" class="form-control" value="{{$party->address->city}}"/>
</div>
<div class="form-group">
    <label>Region</label>
    <input type="text" name="region" class="form-control" value="{{$party->address->region}}"/>
</div>
<div class="form-group">
    <label>Country</label>
    <input type="text" name="country" class="form-control" value="{{$party->address->country}}"/>
</div>
<div class="form-group">
    <label>Zip Code</label>
    <input type="text" name="zip_code" class="form-control" value="{{$party->address->zip_code}}"/>
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{$party->address->phone}}"/>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" value="{{$party->address->email}}"/>
</div>
<div class="form-group">
    <label>Birth Info</label>
    <div class="form-inline">
        <input type="text" name="pob" class="form-control" placeholder="Place" value="{{$party->pob}}"/>
        <input type="text" name="dob" class="form-control datepicker" placeholder="Date" value="{{$party->dob}}"/>
    </div>
</div>