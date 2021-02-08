@extends('layouts.app')

@section('content')

<div class="row mt-2">
   {{-- @dump($page) --}}
     {{-- @dump($users) --}}

    <div class="col-md-9 offset-md-2">
        <div class="card mb-3" style="min-width: 18rem;">
           
            <div class="card-body">

                <div class="card-title">
                    <h4> {{$page->name}}</h4>
                </div>

                {{-- <img src="{{asset('storage/coverImages/' . $page->image)}}" alt="" height="400" width="700"> --}}

                <div class="card-text">
                    {{$page->body}}
                </div>
                
                <hr>
                <small class="text-muted"> <p> {{$page->created_at}}</p></small>
            {{-- <p style="color:brown;">created by: {{$users->name}}</p> --}}
            {{-- @auth --}}

                    {{-- @if( auth()->user()->id == $page->user_id) --}}
                     <a href="{{route('page.edit',['id'=> $page->id]) }}" class="btn btn-primary float-left mr-2"> Edit</a>
                
                    <form action="{{route('page.delete', ['id' => $page->id])}}" method="POST"> 
                    
                        @csrf
                        {{-- @method('DELETE')   --}}
                        <button type="submit" class="btn btn-danger float-left"> Delete</button>

                    {{-- </form> --}} 



                {{-- @endif --}}
            {{-- @endauth --}}
            </div>    

        </div>
    </div>
</div>



@endsection
