@extends('layouts.app')

@section('title')show @endsection
@section('content')

<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">post</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"> id: {{$post['id']}} </h6>
            <p class="card-text">title: {{$post['title']}}</p>
            <p class="card-text">description: {{$post->description}}</p>
            <p class="card-text">Created At: {{$post['created_at']}}</p>

        </div>
    </div>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Posted by</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{$post->user? $post->user->name:"not found"}}</h6>
        <p class="card-text">{{$post->user?$post->user->email:"not found"}}</p>
        <p class="card-text">Created at : {{$post->created_at->addDays(35)->format('Y-m-d')}} </p>

    </div>
</div>
</div>
@endsection
