<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Illuminate\Support\Facades\Redis;

class PagesController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        $posts->map(function ($post) {
            $redis = Redis::connection();
            $post->views = $redis->get('post:' . $post->id . ':views');
            $post->title = substr($post->title , 0, 50).'...';
            return $post;
        });
        return view('pages.index')->with('posts', $posts);
    }

    public function about(){
        return view('pages.about');
    }

    public function becomeMember() {
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        $posts->map(function ($post) {
            $redis = Redis::connection();
            $post->views = $redis->get('post:' . $post->id . ':views');
            $post->title = substr($post->title , 0, 50).'...';
            return $post;
        });
        return view('pages.become_member', compact('posts'));
    }

    public function members() {
        return view('pages.members');
    }

    public function activities () {
        $posts = Post::orderBy('created_at','desc')->where('category' ,'ostalo')->paginate(500);
        $posts->map(function ($post) {
            $redis = Redis::connection();
            $post->views = $redis->get('post:' . $post->id . ':views');
            $post->title = substr($post->title , 0, 50).'...';
            return $post;
        });
        return view('pages.activities', compact('posts'));
    }

    public function search(Request $request) {
       
        $this->validate($request, [
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $posts = Post::search($query)->paginate(20);
        $posts->map(function ($post) {
            $redis = Redis::connection();
            $post->views = $redis->get('post:' . $post->id . ':views');
            $post->title = substr($post->title , 0, 50).'...';
            return $post;
        });
        return view('pages.search_results', compact('posts'));
    }

    
  
}
