<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Release;

use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index()
    {


        return view('pages.index');
    }
    public function about()
    {

        return view('pages.about');
    }
    // public function show($id)
    // {
    //     $release = release::find($id);

    //     return view('release.show', compact('release'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd('hhhhh');
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //input hidden 
       // dd("ggg");
        $page = new Page() ;
        $page->release_id =  auth()->user()->id;
        $page->title =  $request->page_title ;
        $page->body =  $request->page_body ;
        
        $page->save();

        return redirect()->route('release')->with('status', 'page was created !');

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

        return redirect()->route('release')->compact('status', 'Release was updated !');


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
        return redirect('/relase')->compact('status', 'release was deleted !');
    }
}
