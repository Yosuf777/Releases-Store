@extends('layouts.app')

@section('content')

 <div class="row">
     <div class="col-md-9 offset-md-2">
         <h3>Edit page</h3>
         <hr>
         <form action="{{route('page.update',['id'=> $page->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">page Name</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$page->title}}">
            </div>
   
            <div class="form-group">
               <label for="body">page description</label>
            <textarea name="body" id="body" cols="30" rows="4" class="form-control"> {{$page->body}}</textarea>
           </div>

   
            <div class="form-group">
               <button type="submit" class="btn btn-primary">Update</button>
           </div>
         </form>

       

         
     </div>
 </div>
@endsection