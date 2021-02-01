@extends('layouts.app')

@section('content')

 <div class="row">
     <div class="col-md-9 offset-md-2">
         <h3>Create New  Page</h3>
         <hr>
         <form action="{{route('page.store') }}" method="POST">

            @csrf
            
           <div class="form-group">
            <label for="page_title">Page Title</label>
            <input type="text" name="page_title" id="page_title" class="form-control">
        </div>

        <div class="form-group">
           <label for="page_body">Page body</label>
           <textarea name="page_body" id="page_body" cols="30" rows="4" class="form-control"></textarea>
       </div>

            {{-- <div class="form-group">
                <input type="file" name="coverImage" id="coverImage" class="form-control-file">
            </div> --}}

            <div class="form-group">
               <button type="submit" class="btn btn-primary">Create</button>
           </div>
         </form>

       

     </div>
 </div>
@endsection