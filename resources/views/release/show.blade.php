@extends('layouts.app')

@section('content')
<div class="row mt-2">
    <div class="col-md-9 offset-md-2">
        <div class="card mb-3" style="min-width: 18rem;">
           
            <div class="card-body">
                <div class="card-title">
                    <h4> {{$release->title}}</h4>
                </div>

                <img src="{{asset('storage/coverImages/' . $release->image)}}" alt="" height="400" width="700">

                <div class="card-text">
                    {{$release->body}}
                </div>
                
                <hr>
                <small class="text-muted"> <p> {{$release->created_at}}</p></small>
            {{-- <p style="color:brown;">created by: {{$release->user->name}}</p> --}}
            {{-- @auth

                    @if( auth()->user()->id == $post->user_id)
                    <a href="{{ '/posts/' . $post->id . '/edit'}}" class="btn btn-primary float-left mr-2"> Edit</a>
                
                    <form action="{{route('posts.destroy', ['id' => $post->id])}}" method="POST">
                    
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-left"> Delete</button>

                    </form>
                @endif
            @endauth --}}
            </div>    
        </div>
    </div>
</div>

@endsection
