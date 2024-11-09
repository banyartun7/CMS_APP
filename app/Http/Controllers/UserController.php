<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserstoreRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        return view('admin.user.add');
    }

    public function store(UserstoreRequest $request){
        $user = User::create($request->validated() + ['password' => Hash::make($request->password)]);
        Profile::create([
            'user_id' => $user->id,
            'profile_img' => 'default.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet optio quidem voluptates cumque id quasi obcaecati impedit unde soluta, recusandae incidunt vitae libero reiciendis quas ea saepe est ratione necessitatibus!'
        ]);
        
        return redirect('/user')->with('status',"User created successfully!");
    }
}
