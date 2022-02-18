@extends('admin.master')
@section('content')

<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-3 text-gray-800">All Events Registrations</h1>
</div>
@include('admin.events.message')
    
<form class="mb-3" method="GET" action="{{route('admin.all-events.enrollments')}}">
    <div class="form-row align-items-center">
    <div class="col-5 my-1">
    <input type="text" value="{{request()->name}}" name="name" class="form-control" placeholder="Name">
    </div>
      <div class="col-5 my-1">
        <select name="event" class="custom-select mr-sm-2">
          <option value="" selected>Choose...</option>
            @foreach ($events as $event)
            <option {{(request()->event == $event->id ) ? 'selected' : '';}} value="{{$event->id}}">{{$event->title}}</option>  
            @endforeach
          
        </select>
      </div>
      <div class="col-2 my-1">
        <button type="submit" class="btn btn-primary w-100">Search</button>
      </div>
    </div>
  </form>
  
  <table class="table">
<tr class="table-primary">
    <th>ID</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Event</th>
    
    
</tr>
@foreach ($enrollments as $enroll)
<tr>
    <td>{{$enroll->id}}</td>
    <td>{{$enroll->name}}</td>
    <td>{{$enroll->mobile}}</td>
    <td>{{ $enroll->event->title }}</td>
    
    
</tr>  
@endforeach

</table>
@stop