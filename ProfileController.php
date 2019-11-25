<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index( $user)
    {
        //dd($user);
      $user= \App\User::findOrFail($user);
     $follows = \App\User::findOrFail($user);
       $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
      //dd($follows);
      return view('profiles.index',[
            'user' => $user,'follows' => $follows
        ]);
    }

    public function edit($user)
    {
        $user= \App\User::findOrFail($user);
$this->authorize('update',$user->profile);
        return view('Profiles.edit',['user' => $user,]);
    }
    public function update(\App\User $user){
$data = request()->validate([
    'title' => 'required',
    'description' => 'required',
    'url' => 'url',
    'image' => '',

]
);

if(request('image')){

    $imagepath = request('image')->store('profile','public');

    $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000,1000);
    $image->save();
    $imageArray = ['image' => $imagepath];
}
//$merged1 = array_merge($data,['image' => $imagepath]);
 auth()->user()->profile->update(array_merge(
    $data,
    $imageArray ?? []

    ));



//dd($merged1);

return redirect("/profile/{$user->id}");
//dd($data);
    }
}
