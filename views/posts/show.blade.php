@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-8">
          <img src="/storage/{{$post->image}}" class=" w-100">
    </div>

    <div class="col-4">
        <div>
            <div class="d-flex align-items-center">
                <div class = "pr-3">
                  <img src="{{$post->user->profile->profileImage() }}"  style="max-width:60px" class="rounded-circle w-100">
                </div>

             <div>
              <div class="font-weight-bold d-flex"> <a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a>

              <a href="">Follow</a>
              </div>
             </div>
            </div>

           <p> <a href="/profile/{{$post->user->id}}"><span class="text-dark"> {{$post->caption}}</span></a></p>
       </div>

</div>

</div>
@endsection
