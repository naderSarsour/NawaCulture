@extends('admin.master')
@section('content')

<!-- Page Heading -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-3 text-gray-800">All News</h1>
<a class="btn btn-outline-success" href="{{route('admin.news.create')}}">Add New Post</a>
</div>
@include('admin.news.message')
    

<table class="table">
<tr class="table-primary">
    <th>ID</th>
    <th>Title</th>
    <th>Image</th>
    <th>Action</th>
</tr>
@foreach ($news as $new)
<tr>
    <td>{{$new->id}}</td>
    <td>{{$new->title}}</td>
    <td><img width="100" src="{{asset('uploads/'.$new->image)}}" alt=""></td>
    <td>
        <a href="{{ route('admin.news.edit',$new->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
        <form class="d-inline" action="{{route('admin.news.destroy',$new->id)}}" method="POST">
        @csrf
        @method('delete')
        <button onclick="return confirm ('Are You Sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
        </form>
    </td>
    
</tr>  
@endforeach

</table>
@stop