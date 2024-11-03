@extends('layouts.app')
@section('title')edit @endsection
@section('content')
    <div class="container">

        <form method="post" action="{{route('posts.update',$post['id'])}}">
            @csrf
            @method('put')
            <label for="title">title:</label><input name="title" id="title" value="{{$post->title}}" type="text"><br>
            <label for="description">description:</label><textarea name="description" id="description"  type="text">{{$post->description}}</textarea><br>
            <label for="posted_by">posted by:</label><select name="posted_by"  id="posted_by">
                @foreach($users as $user)
                    <option @if($post->user)@selected($user->id == $post->user->id) @endif value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select><br>
                   <input name="updated_at" type="hidden" value="{{date('Y-m-d H:i:s')}}">
            <input type="submit" value="edit" class="btn btn-primary">
        </form>
    </div>









    {{--{{date('Y-m-d H:i:s',time())}}--}}





























@endsection
