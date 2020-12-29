@extends('master')
@section('content')
    <div class="space50">&nbsp;</div>
    <div class="container beta-relative">
        <div class="pull-left"><h2>List</h2></div>
        <div class="pull-right"><input type="text" name="" id="" placeholder="Search ID">
        </div></div>
        <div class="container">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">name</th>
                        <th scope="col">image</th>
                        <th scope="col">typeroom</th>
                        <th scope="col">number</th>
                        <th scope="col">area</th>
                        <th scope="col">price</th>
                    <th scope="col"><a href="{{route('getadminadd')}}" class="btn btn-primary" style="width: 80px;">Add</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <th scope="row">{{$room->id}}</th>
                        <td>{{$room->name}}</td>
                        <td><img src="source/image/product/{{$room->image}}" alt="" style="width: 100px; height: 100px"></td>
                        <td>{{$room->id_type}}</td>
                        <td>{{$room->number}}</td>
                        <td>{{$room->area}}</td>
                        <td>{{$room->price}}</td>

                    {{-- <td><form action="{{route('getadminedit',$room->id)}}" method="GET" role="form">
                        @csrf
                        <button class="btn btn-warning" name="edit" style="width: 80px">Edit</button>
                    </form> --}}
                    {{-- <form action="{{route('admindelete',$room->id)}}" method="POST" role="form">
                        @csrf
                        <button class="btn btn-danger" name="delete" style="width: 80px">Delete</button>
                    </form> --}}
                {{-- </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
                {{-- <form action="{{route(display_room),$room->id}}">
                    <button class="btn btn-primary" style="text-align: center">Show Rooms</button>
                </form> --}}
        </div>
        <div class="space50">&nbsp;</div>
@endsection
