<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('profiles.user_profile');
    }
    public function edit(){
        return view('profiles.user_update');
    }

    public function update(Request $request){
        dd($request->file());
        
    }
}
