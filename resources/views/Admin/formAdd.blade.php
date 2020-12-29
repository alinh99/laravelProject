@extends('master')
@section('content')
<div class="space50">&nbsp;</div>
<div class="container beta-relative">
    <div class="pull-left">
        <h2>Thêm sản phẩm</h2>
    </div>
</div>
    <div class="space50">&nbsp;</div>
    {{--@include('blocks/error')--}}

    <div class="container">
        <form role="form" action="{{route('adminadd')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputRoomName">Name</label>
                <input type="text" name="name" id="exampleInputRoomName" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="image">Image File</label>
                <input type="file" name="image" id="image" class="form-control-file" placeholder="Enter Image File">
            </div>
            <div class="form-group">
                <label for="1">Type of Room</label>
                <input type="text" name="id_type" id="1" class="form-control" placeholder="Enter Type of Room">
            </div>
            <div class="form-group">
                <label for="2">Number of Room</label>
                <input type="text" name="number" id="2" class="form-control" placeholder="Enter Number of Room">
            </div>
            <div class="form-group">
                <label for="3">Price of Room</label>
                <input type="text" name="price" id="3" class="form-control" placeholder="Enter Area of Room">
            </div>
            <div class="form-group">
                <label for="4">Area of Room</label>
                <input type="text" name="area" id="4" class="form-control" placeholder="Enter Price of Room">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
<div class="space50">&nbsp;</div>
@endsection
