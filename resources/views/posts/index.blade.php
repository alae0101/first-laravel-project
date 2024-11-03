@extends('layouts.app')

@section('title')index @endsection
@section('content')
    <a href=""></a>
<div class="container">

<table class="table ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">Posted by</th>
        <th scope="col">created at</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
<tbody>

    @foreach($posts as $V)
        <tr>

        <th scope="row">{{$V['id']}}</th>
        <td>{{$V['title']}}</td>
        <td>
            {{$V->user?$V->user->name:'not found'}}
        </td>
        <td>{{$V['created_at']}}</td>
        <td>
            <a href="{{route('posts.show',$V['id'])}}" class="btn btn-info">View</a>
            <a href="{{route('posts.edit',$V['id'])}}"  class="btn btn-primary">Edit</a>
            <form id="form" class="form" style="display:inline" action="{{route('posts.destroy',$V['id'])}}" method="post" > @csrf @method('delete') <button type="button"  class="btn btns btn-danger">Delete</button> </form>

        </td>

        </tr>
    @endforeach
    </tbody>
</table>
</div>
    <script>
        form = document.querySelectorAll('.form');
        btn = document.querySelectorAll('.btns');


        btn.forEach((e,i)=>{

            e.addEventListener('click',()=>{

                if ( confirm('are you sure, you want to delete?')) {


                e.parentNode.submit()
                }
            });

            })
    </script>

@endsection
