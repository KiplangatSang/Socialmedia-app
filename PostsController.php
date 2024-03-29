<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profile_user.user_id');
        $posts = Post::whereIn('user_id' , $users)->orderBy('created_at', 'DESC')->paginate(5);

        //dd($posts);
       return view('posts.index',compact('posts'));
    }

  public function create(){
      return view('posts.create');
  }

 public function store(){

    $data = request()->validate([

        'caption' => 'required',
        'image' => ['required','image'],
    ]);

    $imagepath = request('image')->store('uploads','public');

    $image = Image::make(public_path("storage/{$imagepath}"))->fit(1200,1200);
    $image->save();

    auth()->user() ->posts()->create([
    'caption' => $data['caption'],
    'image' => $imagepath,
]);

  //  \App\Post::create($data);

   // dd(request()->all());
   return redirect('/profile/' . auth() -> user() ->id);
 }

public function show(\App\Post $post){
return view('posts.show',compact('post'));
}
}
