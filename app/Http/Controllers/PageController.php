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
    public function show($id)
    {
        $page = Page::find($id);
// dd($page);
        return view('pages.show', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        // dd('hhhhh');
        $release = release::find($id);

        return view('pages.create',compact('release'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request,$id)

    public function store(Request $request)
    {
       //input hidden 
       // dd("ggg");
       $releases = new Release();
        $page = new Page() ;
        $page->name =  $request->page_name ;
        $page->body =  $request->page_body ;
        // $page->release_id =          auth()->user()->id;
        // $page->release_id =  $id;

        $page->release_id =  $request->release_id;

        $page->save();

        return redirect()->route('show', ['id' =>  $request->release_id ])->with('status', 'page was created !');

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
       
        $page = Page::find($id);
        // if (auth()->user()->id !== $release->user_id) {
        //     return redirect('/release')->with('error', ' You are not authorized');
        // }
      //  dd('lol');
        return view('pages.edit', compact('page'));
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

        $page = Page::find($id);
        $page->title =  $request->title ;
        $page->body =  $request->body ;
      //  $release->user_id = $request->id;
        $page->save();

        return redirect()->route('release')->with('status', 'Release was updated !');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy($page)
    {
    
      
       $page = Page::find($page) ;
      //  dd('ddd');


        
        $page->delete();
        return redirect('/release')->with('status', 'release was deleted !');
    }
}
