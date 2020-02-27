<?php

namespace App\Http\Controllers;
use App\Post;
use App\Member;
use App\Mail\Membership;
use Mail;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'addMember', 'becomeMember']]);
    }

    public function index() {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function becomeMember() {
        $posts = Post::orderBy('created_at','desc')->paginate(500);
        $posts->map(function ($post) {
            $post->title = substr($post->title , 0, 50).'...';
            return $post;
        });
        return view('members.become_member', compact('posts'));
    }

    public function addMember(Request $request) {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'image' => 'nullable|max:1999',
            'jmbg' => 'required|size:13',
            'place' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'description' => 'min:220|max:250',
            'company' => 'required',
            'pib' => 'required',
            'date' => 'required',
            'address' => 'required',
            'work' => 'required',
            'organization' => 'required'
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
        
        Mail::to('jelenavucetic24@gmail.com')->send(new Membership($member));
 
        return redirect()->back()->with('success', 'Uspješno ste poslali zahtjev za članstvo');
    }

    public function showMembers() {
        $members = Member::withAnyStatus()->get();
        return view('members.show_member', compact('members'));
    }

    public function edit($id) {
        $member = \DB::table('members')->where('id', $id)->first();
        return view('members.edit', compact('member', 'id'));
    }

    public function update(Request $request, $id)
    {
        switch($request->get('approve'))
        {
            case 0:
                Member::postpone($id);
                break;
            case 1:
                Member::approve($id);
                break;
            case 2:
                Member::reject($id);
                break;
            case 3:
                Member::postpone($id);
                break;
            default:    
                break;

        }
        return redirect()->back();    
    }
}
