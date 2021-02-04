@extends('layouts.app')

@section('content')

 <div class="row">
     <div class="col-md-9 offset-md-2">
         <h3>Create New  Release</h3>
         <hr>
         <form action="{{route('store') }}" method="POST">

            @csrf
            <div class="form-group">
                <label for="title">Release Name</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
   
            <div class="form-group">
               <label for="body">Release description</label>
               <textarea name="body" id="body" cols="30" rows="4" class="form-control"></textarea>
           </div>

           <div class="form-group">
         
           
          
 <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown" 
aria-haspopup="true" aria-expanded="false">Select Tags </button>

<div class="dropdown-menu">
<a class="dropdown-item">
<!-- Default unchecked -->

@foreach($tags as $tag)

<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="checkbox1" name="tag_name" value="{{ $tag->name }}">
<label class="custom-control-label" for="checkbox1">{{ $tag->name }}</label>
</div>
</a>


@endforeach
</div> 

{{-- <div>
@foreach($tags as $tag)
{{ $tag->name }}
</div> --}}
<!-- Basic dropdown -->
           
          </div>




            <div class="form-group">
               <button type="submit" class="btn btn-primary">Create</button>
           </div>

           
         </form>

       

     </div>
 </div>
@endsection