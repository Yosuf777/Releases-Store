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

            {{-- <select class="form-select" aria-label="Default select example">
                <option selected>Release Tags menu</option>
                <option value="first_tag">first tag</option>
                <option value="second_tag">second tag</option>
                <option value="third_tag">Third tag</option>
              </select> --}}
<!-- Basic dropdown -->
{{-- <button class="btn btn-primary dropdown-toggle mr-4" type="button" data-toggle="dropdown"
aria-haspopup="true" aria-expanded="false">Select Tags </button>

<div class="dropdown-menu">
<a class="dropdown-item">
<!-- Default unchecked -->
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="checkbox1">
<label class="custom-control-label" for="checkbox1">tag one</label>
</div>
</a>
<a class="dropdown-item" href="#">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="checkbox2" checked>
<label class="custom-control-label" for="checkbox2">tag two</label>
</div>
</a>
<a class="dropdown-item" href="#">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="checkbox3">
<label class="custom-control-label" for="checkbox3">tag three</label>
</div>
</a>

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