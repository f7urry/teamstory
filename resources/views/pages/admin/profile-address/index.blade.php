@extends("layouts.app")
@section("title","Address")
@section("content")
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <a class="btn btn-primary mb-2" id="btn_add" href="{{url('/profileaddress/create/')}}"><i class="fa fa-plus"></i> Add Address</a>
            <table class="table table-bordered table-hover table-striped" id="addressTable" width="100%" cellspacing="0">
                <thead class='thead-dark'>
                    <tr>
                    	<th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($address as $addr)
                        <tr>
                            <td>
                            <b>{{$addr->pic_name}}</b><br/>
                            {{$addr->address}}
                            {{$addr->city->location}},
                            {{$addr->province->location}},
                            {{$addr->province->parent->location}},
                            {{$addr->zipcode}}<br/>
                            {{$addr->phone}}<br/>
                            {{$addr->email}}<br/>
                            </td>
                            <td>
                                <a class='btn btn-info' href="{{url('/profileaddress/'.$addr->id)}}"><i class="fa fa-eye"></i></a>
                                <a class='btn btn-danger btn-delete' href="#" data-href="{{url('/profileaddress/'.$addr->id)}}" data-message="Dou you want delete {{$addr->location}}?"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pull-right"></div>
        </div>
    </div>
</div>
@endsection