@extends('layouts.app')
@section('title') create @endsection
@section('content')
    <div class="container">
            <h1>Create Post</h1>

        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <label for="title">title:</label><input name="title" id="title" type="text" value="{{old('title')}}"><br>
            <label for="description">description:</label><textarea name="description"  id="description" type="text">{{old('description')}}</textarea><br>
            <label for="posted_by">posted by:</label>
            <select name="posted_by"  id="posted_by">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <br>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            @if($error!="The user id field is required.")
                            <li>{{ $error }}</li>
                                @else
                            <li>posted by field is required.</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif
            <input name="created_at" type="hidden" value="{{date('Y-m-d H:i:s')}}">
            <input type="submit"  class="btn btn-success">
        </form>
    </div>

@endsection
