@extends('layouts.app')

@section('content')
<div class="container">
<h1>click on post to view profile</h1>
@foreach($posts as $post)

<div class="row">
    <div class="col-6 offset-2">
    <a href="/profile/{{$post->user->id}}">
    <img src="/storage/{{$post->image}}" class=" w-100">
</a>
    </div>
</div>
<div class="row pt-2 pb-4">
    <div class="col-6 offset-2">
              <div class="font-weight-bold d-flex">
               <a href="/profile/{{$post->user->id}}">
               <span class="text-dark">{{$post->user->username}}
               </span>
               </a>

               </div>
               <p> <a href="/profile/{{$post->user->id}}"><span class="text-dark"> {{$post->caption}}</span></a></p>

    </div>

</div>

</div>
@endforeach

     <div class="row">
     <div class="col-12 d-flex justify-content-center">
      {{$posts->links()}}
     </div>
     </div>

</div>
@endsection
