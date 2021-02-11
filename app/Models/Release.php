<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;


//many to one 
public function pages() {
    return $this->hasMany('App\Models\Page');
}

//one to many
public function user() {
    return $this->belongsTo('App\Models\User');
}


public function tags()
{
    return $this->belongsToMany(Tag::class , 'release_tag', 'release_id' ,'tag_id');
}

public function hastags($tag){
   // return true;
    if ($this->tags()->where('tag_id', $tag)->first())
    {
        return true;
    }
    return false;
}
}