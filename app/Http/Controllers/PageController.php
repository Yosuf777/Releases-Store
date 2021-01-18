<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function getIndex()
{
    # code...
    // dd('get index from controller ');

    $title = 'Hello to index';
    return view('welcome')->with('title' ,$title); 

}
}
