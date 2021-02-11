<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Release;
use App\Models\Tag;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        $releases = release::orderBy('id', 'desc')->paginate(10);
        $count = release::count();
        return view('release.index',  compact('releases', 'count' , 'tags'));
    }
    public function show($id)
    {
        $release = release::find($id);

        return view('release.show', compact('release'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $tags = Tag::all();

        return view('release.create', ['tags' => $tags]);
        // return view('release.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //   dd($request->all());
        $request->validate([

            'title' =>  'required|max:200',
            'body' => 'required|max:500'

        ]);

        $release = new Release() ;
        $release->name =  $request->title ;
        $release->body =  $request->body ;

        $release->user_id = auth()->user()->id ;
       
        $release->save();
      
       // $tagsIds = Tag::find($request->tag_id);
       // $release = release::find($id);

       $release->tags()->attach($request->tags); 

        return redirect()->route('release')->with('status', 'Release was created !');

    }
 // $releasesIds = [1,2];
        // $release->tags()->attach($releasesIds);



    //    $tag = new Tag();

        // $tag->name =  $request->tag_name;


        // $tag->save();


       // $tag->releases()->attach($release);



   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd('ddd');
     //   $tags = Tag::all();

        $release = release::find($id);
        $tags = Tag::all();
        // if (auth()->user()->id !== $release->user_id) {
        //     return redirect('/release')->with('error', ' You are not authorized');
        // }
        return view('release.edit', compact('release','tags'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([

            'title' =>  'required|max:200',
            'body' => 'required|max:500'

        ]);
        $release = release::find($id);
       // $release = release::find($id);
        $release->name =  $request->title ;
        $release->body =  $request->body ;
       // $tags = Tag::all();
     //  dd($request->all());
        $release->tags()->sync($request->tags); 

        $release->save();

        return redirect()->route('release')->with('status', 'Release was updated !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy($release , Request $request) 
    {
    
        $release = release::find($release) ;
      //  dd('ddd');

        $release->delete();
        $release->tags()->detach($request->tags); 

        return redirect('/release')->with('status', 'release was deleted !');
    }
}
