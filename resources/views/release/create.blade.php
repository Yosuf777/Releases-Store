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
               <button type="submit" class="btn btn-primary">Create</button>
           </div>

           <div class="form-group">
            <label for="body">Release Tags</label>

            <a class="dropdown-item" href="1">first Tag</a>
            <a class="dropdown-item" href="2">Second Tage </a>
            <a class="dropdown-item" href="3">third Tage  </a>
s
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Release Tags
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <button class="dropdown-item" type="button">first Tag</button>
                  <button class="dropdown-item" type="button">Second Tage</button>
                  <button class="dropdown-item" type="button">third Tage</button>
                </div>
              </div>
          </div>
         </form>

       

     </div>
 </div>
@endsection