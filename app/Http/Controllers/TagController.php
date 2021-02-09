<?php

namespace App\Http\Controllers;
use App\Models\Release;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function index()
    {
       
        $tags = Tag::orderBy('id', 'desc')->paginate(10);
        $count = Tag::count();
        return view('tag.index',  compact('tags', 'count'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        return view('tag.show', compact('tag'));
    }





}
