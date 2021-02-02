<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Release;
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
       
        $releases = release::orderBy('id', 'desc')->paginate(10);
        $count = release::count();
        return view('release.index',  compact('releases', 'count'));
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
        return view('release.create');
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
        $release->description =  $request->body ;

        $release->user_id = auth()->user()->id ;

        // $page = new Page();
        // $page->title =  $request->page_title ;
        // $page->body =  $request->page_body ;
        // $page->release_id =  auth()->user()->id;
        // $table->string('title');
        // $table->string('body');
        // $table->unsignedInteger('release_id');

        // $table->id();
        // $table->string('name');
        // $table->text('description');
        // $table->string('username');
        // $table->timestamps();

        $release->save();
        // $page->save();

        return redirect()->route('release')->with('status', 'Release was created !');



    }

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
        $release = release::find($id);
        // if (auth()->user()->id !== $release->user_id) {
        //     return redirect('/release')->with('error', ' You are not authorized');
        // }
        return view('release.edit', compact('release'));
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
        $release->name =  $request->title ;
        $release->description =  $request->body ;
      //  $release->user_id = $request->id;
        $release->save();

        return redirect()->route('release')->with('status', 'Release was updated !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy($release)
    {
    
        $release = release::find($release) ;
      //  dd('ddd');

        $release->delete();
        return redirect('/release')->with('status', 'release was deleted !');
    }
}
