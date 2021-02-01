@extends('layouts.app')

@section('content')

<div class="row mt-2">
   {{-- @dump($release) --}}
     {{-- @dump($users) --}}

    <div class="col-md-9 offset-md-2">
        <div class="card mb-3" style="min-width: 18rem;">
           
            <div class="card-body">
                <a href="{{route('page.create') }}" class="btn btn-primary float-right mr-2"> Create Page</a>

                <div class="card-title">
                    <h4> {{$release->name}}</h4>
                </div>

                {{-- <img src="{{asset('storage/coverImages/' . $release->image)}}" alt="" height="400" width="700"> --}}

                <div class="card-text">
                    {{$release->description}}
                </div>
                
                <hr>
                <small class="text-muted"> <p> {{$release->created_at}}</p></small>
            {{-- <p style="color:brown;">created by: {{$users->name}}</p> --}}
            {{-- @auth --}}

                    {{-- @if( auth()->user()->id == $release->user_id) --}}
                    <a href="{{route('edit',['id'=> $release->id]) }}" class="btn btn-primary float-left mr-2"> Edit</a>
                
                    <form action="{{route('delete', ['id' => $release->id])}}" method="POST"> 
                    
                        @csrf
                       {{-- @method('DELETE')  --}}
                       <button type="submit" class="btn btn-danger float-left"> Delete</button>

                    </form>



                {{-- @endif --}}
            {{-- @endauth --}}
            </div>    

        </div>
    </div>
</div>



@endsection
