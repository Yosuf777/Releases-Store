@extends('layouts.app')

@section('content')

 <div class="row">
     <div class="col-md-9 offset-md-2">
         <h3>Edit Release</h3>
         <hr>
         <form action="{{route('update',['id'=> $release->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Release Name</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$release->name}}">
            </div>
   
            <div class="form-group">
               <label for="body">Release body</label>
            <textarea name="body" id="body" cols="30" rows="4" class="form-control"> {{$release->body}}</textarea>
           </div>
           



           @foreach ($tags as $tag)
           <div class="form-group" >   

               <li>
                {{$tag->name }}

           <input type="checkbox" name="tags[]"  value="{{ $tag->id }}"  
            {{$release->hastags($tag->id) ? 'checked':'' }}>
        </li>
           @endforeach 





           {{-- @foreach ($release->tags as $tag)
           
           <li>
               <label>
                   <input type="checkbox" name="tags[]"  checked>
                   {{ $tag->name }}

                   <small class="text-muted" name="tags[]"> {{ $tag->name }}</small>

            
               </label>
              </li> 
              
           @endforeach
         
           </li>
           @foreach ($tags as $tag)
                  
           <input type="checkbox" name="tags[]" value="{{ $tag->id }}" >
           {{ $tag->name }}
               @endforeach --}}

       


            <div class="form-group">
               <button type="submit" class="btn btn-primary">Update</button>
           </div>
         </form>

       

         
     </div>
 </div>
@endsection