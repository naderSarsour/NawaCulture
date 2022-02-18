@extends('admin.master')
@section('content')

<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-3 text-gray-800">All Events</h1>
<a class="btn btn-outline-success" href="{{route('admin.events.create')}}">Add New Event</a>
</div>
@include('admin.events.message')
    

<table class="table">
<tr class="table-primary">
    <th>ID</th>
    <th>Title</th>
    <th>Image</th>
    <th>Start date</th>
    <th>End date</th>
    <th>Action</th>
    
</tr>
@foreach ($events as $event)
<tr>
    <td>{{$event->id}}</td>
    <td>{{$event->title}}</td>
    <td><img width="100" src="{{asset('uploads/'.$event->image)}}" alt=""></td>
    <td>{{$event->start_date}}</td>
    <td>{{$event->end_date}}</td>
    <td>
        <a href="{{ route('admin.events.edit',$event->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
        <form class="d-inline" action="{{route('admin.events.destroy',$event->id)}}" method="POST">
        @csrf
        @method('delete')
        <button onclick="return confirm ('Are You Sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
        </form>
    </td>
    
</tr>  
@endforeach

</table>
@stop