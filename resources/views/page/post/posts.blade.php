@extends('layouts.navapp') 
@section('content') @foreach($posts as $post)
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">{{$post->title}}</h1>
      <small>{{$post->user->name}}</small>
      <p>{{$post->body}}</p>
      @if(count($post->comments))
        @foreach($post->comments as $post->comment)
          <hr>
          <p>{{$post->comment->content}}</p>
          <small>By : {{$post->comment->user->name}}</small>
        @endforeach
      @endif
      <p>
        <a class="btn btn-primary btn-lg" href="/posts/single/{{$post->id}}" role="button">Learn more &raquo;</a>
      </p>
      @if(Auth::user())
        <form action="/comment" method="POST">
          @csrf
          <textarea name="comment_body" id="" cols="45" rows="5"></textarea>
          <input type="hidden" name="user_id" id="" value="{{Auth::user()->id}}">
          <input type="hidden" name="post_id" id="" value="{{$post->id}}">
          <div>
        <button class="btn btn-primary btn-lg" type="submit">Commit</button>
      </div>
      </form>
      @endif  
  </div>
  </div>
  <!-- /container -->

</main>
@endforeach
@endsection