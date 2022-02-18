@extends('website.master')
@section('content')
<main>
  <div class="container my-5">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('uploads/'.$news->image)}}" class="w-100" alt="">
        </div>

        <div class="col-md-6">
          <h1>{{$news->title}}</h1>
          <span class="d-block mb-3">{{$news->created_at}}</span>
          <p>{{$news->content}}</p>
        </div>

        <div class="col-md-12 mt-4">
          <h3>Comments ({{$news->comments->count()}})</h3>

          <ul class="list-unstyled">
            <li>
              @foreach ($news->comments as $item)
              <b>{{$item->user->name}}</b>
              <small>{{$item->created_at->format('d/m/Y')}}</small>
              <p>{{$item->comment}}</p>
              @endforeach
              
              
            </li>
          </ul>

          <h4>Leave Comment</h4>
          @auth
          <form method="POST" action="{{route('website.comments',$news->id)}}">
            @csrf
            <textarea name="comment" class="form-control mb-3" id="comment" rows="5"></textarea>
            <div class="text-end"><button class="btn btn-primary px-5">Post</button></div>
          </form>
          @endauth
          @guest
              <p> To add comment here you must be login here<a href="{{route('login')}}">Login</a>. You dont have account register here <a href="{{route('register')}}">Register</a></p>
          @endguest
        </div>
      </div>
  </div>
</main>

@endsection