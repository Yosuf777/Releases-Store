<?php

namespace App\Http\Controllers;

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
        
        // $table->id();
        // $table->string('name');
        // $table->text('description');
        // $table->string('username');
        // $table->timestamps();

        $release->save();

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
    public function update(Request $request, Release $release)
    {
        
        $request->validate([

            'title' =>  'required|max:200',
            'body' => 'required|max:500'

        ]);

        $release = new Release() ;
        $release->name =  $request->title ;
        $release->description =  $request->body ;
        
        $release->save();

        return redirect()->route('release')->with('status', 'Release was updated !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        //
        $release = release::find($release) ;
        $release->delete();
        return redirect('/release')->compact('status', 'release was deleted !');
    }
}
