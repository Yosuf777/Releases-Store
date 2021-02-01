<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    use HasFactory;


//many to one 
public function pages() {
    return $this->hasMany('App\Page');
}

//one to many
public function user() {
    return $this->belongsTo('App\User');
}
}