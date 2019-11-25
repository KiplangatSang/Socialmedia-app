<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

public function profileImage(){
    $imagePath = ($this->image) ?   $this->image : 'profile/3X22r9pdxvkgjkzb92B2FwUt5cNQFnKWNbxhbNVb.jpeg';

    return '/storage/' . $imagePath;
}

public function followers(){
  return $this->belongsToMany(\App\User::class);
}

    public function user(){
        return $this -> belongsTo(\App\User::class);
    }
}
