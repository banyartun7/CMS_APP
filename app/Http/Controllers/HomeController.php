<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id','DESC')->get();
        return view('index',compact('posts'));
    }

    public function detail($slug)
    {
        $randoms = Post::all()->random(3);
        $shows = Post::where('slug',$slug)->first();
        $tags = Tag::all();
        return view('postDetail',compact('shows','randoms','tags'));
    }

    public function profile($id){
        $user = User::findorFail($id);
        return view('admin.user.profile',compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:users|min:5',
            'email' => 'required',
            'about' => 'required',
        ]);
        $user = User::findorFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if(!empty(request()->profile_img)){
            $imageName = date('YmdHis') . "." . request()->profile_img->getClientOriginalExtension();
            request()->profile_img->move(public_path('images'), $imageName);
        }

        $user->profiles->update([
            'profile_img' => empty($imageName) ? $user->profiles->profile_img : $imageName,
            'about' => $request->about,
            'facebook_link' => $request->facebook_link,
            'youtube_link' => $request->youtube_link
        ]);

        return redirect("/profile/$id/edit")->with('status','User Profile Updated Successfully!');
    }
}
