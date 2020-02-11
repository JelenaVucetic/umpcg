<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at','desc')->paginate(500);
        return view('pages.index')->with('posts', $posts);
    }

    public function about(){
        return view('pages.about');
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function member() {
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        return view('pages.member', compact('posts'));
    }
}
