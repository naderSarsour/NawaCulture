@extends('admin.master')

@section('content')

<div class="container my-5">
<div class="d-flex justify-content-between align-items-center">
    <h1>Edit project : <span class="text-danger">{{$project->title}}</span></h1>
<a class="btn btn-outline-dark" href="{{route('admin.project.index')}}">Return Back</a>
</div>  
@include('admin.errors')      
  <div class="card">
      <div class="card-body">
        <form class="container my-5" action="{{route('admin.project.update',$project->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <lable>Title</lable>
                <input type="text" name="title" value="{{old('title',$project->title)}}" placeholder="Title" class="form-control" />
          
            </div>
            <div class="mb-3">
                <lable>image</lable>
                <input type="file" name="image"  class="form-control" />
                {{-- @if ($project->image) --}}
                <img class="mt-1 img-thumbnail" width="200" src="{{asset('uploads/'.$project->image)}}" alt="">                    
                {{-- @endif --}}
               
            </div>
            
    
            <div class="mb-3">
                <lable>Content</lable>
                <textarea rows="7" name="content"  placeholder="content" class="form-control" >{{old('content',$project->content)}}</textarea>
            
            </div>
            <div class="mb-3">
                <lable>Target</lable>
                <input type="text" name="target" value="{{old('target',$project->target)}}" placeholder="Target" class="form-control" />
          
            </div>
            
            <button class="ntn btn-primary">Edit</button>
        </form>
      </div>
  </div>

</div> 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
@stop