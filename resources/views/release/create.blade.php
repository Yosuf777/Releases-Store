@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Create New Release</h3>
            <hr>
            <form action="{{ route('store') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label for="title">Release Name</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body">Release body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="form-control"></textarea>
                </div>

                <div class="form-group">


                    @foreach ($tags as $tag)
                        <li>

                            <label>
                                <input type="checkbox" name="tag_id[]" value="{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>


                        </li>

                    @endforeach



                </div>




                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>


            </form>



        </div>
    </div>
@endsection
