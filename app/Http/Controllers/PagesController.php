<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Member;
use DB;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        $posts->map(function ($post) {
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
            $post->title = substr($post->title , 0, 50).'...';
            return $post;
        });
        return view('pages.search_results', compact('posts'));
    }

    public function addMember(Request $request) {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'image' => 'image|nullable|max:1999',
            'jmbg' => 'required|numeric|digits:13',
            'place' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $member = new Member;
        
        $member->firstname = $request->firstname;
        $member->lastname = $request->lastname;
        $member->jmbg = $request->jmbg;
        $member->place = $request->place;
        $member->phone = $request->phone;
        $member->email = $request->email;
        if($request->hasFile('image')){
            $member->image = $fileNameToStore;
        }
        $member->company = $request->company;
        $member->pib = $request->pib;
        $member->date = $request->date;
        $member->address = $request->address;
        $member->web = $request->web;
        $member->work = $request->work;
        $member->organization = $request->organization;
        $member->description = $request->description;
        $member->facebook = $request->facebook;
        $member->instagram = $request->instagram;

        $member->save();

        return redirect()->back()->with('success', 'Postali ste član Unije Mladih Preduzetnika');
    }
  
}
