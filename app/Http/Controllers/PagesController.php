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

    public function becomeMember() {
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        return view('pages.become_member', compact('posts'));
    }

    public function members() {
        return view('pages.members');
    }

    public function projects () {
        $posts = Post::orderBy('created_at','desc')->where('category' ,'ostalo')->paginate(500);
        return view('pages.projects', compact('posts'));
    }

    public function search(Request $request) {
       
        $this->validate($request, [
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $posts = Post::search($query)->paginate(20);
        return view('pages.search_results', compact('posts'));
    }
}
