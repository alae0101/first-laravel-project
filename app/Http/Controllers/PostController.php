<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index(){
        $Posts = Post::all();
        $Users = User::all();

     return view('posts.index',['posts'=>$Posts,'users'=>$Users]);
    }
    public function show(Post $post){


//        $singlePost = Post::findorfail($postId);

//        $singlePost = Post::where('id',$postId)->first();

//        $singlePost = Post::where('id',$postId)->get();
//        if(is_null($singlePost)){
//            return to_route('posts.index');
//        }

        return view('posts.show',['post'=>$post]);
    }
    public function create(){
        $users = User::all();

        return view('posts.create',['users'=>$users]);
    }
    public function store(){

//        $post = new Post;
//        $post->title = request('title');
//        $post->description = request()->description;
//        $post->posted_by = request()->posted_by;
//        $post->created_at = request()->created_at;
//
//        $post->save();




        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:20'],
            'posted_by'=>['required','exists:Users,id'],
        ]);

        Post::create(['title'=>request()->title,'description'=>request()->description,'user_id'=>request()->posted_by,'created_at'=>request()->created_at]);


        return to_route('posts.index');
    }
    public function edit(Post $post){

        $users = User::all();
//        foreach($this->allPosts as $v){
//            if($v['id'] == $postId){
//
//        $post =$v;
//            }
//        }

        return view('posts.edit',['post'=>$post,'users'=>$users]);
    }
    public function update(Post $post){
//        $post->title = request()->title;
//        $post->description = request()->description;
//        $post->posted_by = request()->posted_by;
//        $post->save();
        request()->validate([
            'title'=>'required|min:3',
            'description'=>'required|min:2',
            'posted_by'=>'exists:Users,id'
        ]);
        $post->update(['title'=>request()->title,'description'=>request()->description,'user_id'=>request()->posted_by,'updated_at'=>request()->updated_at]);
        return to_route('posts.index');
    }
    public function destroy(Post $post){

        $post->delete();

     return to_route('posts.index');
    }
}
