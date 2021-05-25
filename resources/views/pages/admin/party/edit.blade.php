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
    <input type="text" name="address" class="form-control" value="{{$party->address}}"/>
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control" value="{{$party->phone}}"/>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" value="{{$party->email}}"/>
</div>
<div class="form-group">
    <label>Birth Info</label>
    <div class="form-inline">
        <input type="text" name="pob" class="form-control" placeholder="Place" value="{{$party->pob}}"/>
        <input type="text" name="dob" class="form-control datepicker" placeholder="Date" value="{{$party->dob}}"/>
    </div>
</div>