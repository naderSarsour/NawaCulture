@extends('admin.master')

@section('content')

<div class="container my-5">
<div class="d-flex justify-content-between align-items-center">
    <h1>Add New project</h1>
<a class="btn btn-outline-dark" href="{{route('admin.projects.index')}}">Return Back</a>
</div>  
@include('admin.errors')      
  <div class="card">
      <div class="card-body">
        <form class="container my-5" action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <lable>Title</lable>
                <input type="text" name="title" value="{{old('title')}}" placeholder="Title" class="form-control" />
          
            </div>
            <div class="mb-3">
                <lable>image</lable>
                <input type="file" name="image"  class="form-control" />
               
            </div>
            <div class="mb-3">
                <lable>Content</lable>
                <textarea rows="5" name="content" value="{{old('content')}}" placeholder="content" class="form-control" ></textarea>
            
            </div>
            <div class="mb-3">
                <lable>Target</lable>
                <input type="text" name="target" value="{{old('target')}}" placeholder="Title" class="form-control" />
          
            </div>
            <button class="ntn btn-primary">Add</button>
        </form>
      </div>
  </div>

</div> 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
@stop