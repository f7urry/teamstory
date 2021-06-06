<div class="form-group">
    <label>Identity Number</label>
    <input type="text" name="identity_number" class="form-control" value="{{$party->identity_number}}"/>
</div>
<div class="form-group">
    <label>Name</label>
    <input type="text" name="party_name" class="form-control" value="{{$party->party_name}}"/>
</div>
<div class="form-group">
    <label>Birth Info</label>
    <div class="form-row">
        <div class="form-group col-6">
            <input type="text" name="pob" class="form-control" placeholder="Place" value="{{$party->pob}}"/>
        </div>
        <div class="form-group col-6">
            <input type="text" name="dob" class="form-control datepicker" placeholder="Date" value="{{$party->dob}}"/>
        </div>
    </div>
</div>  