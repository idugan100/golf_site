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
        $validated = $request->validate([

            'about' => 'required|string|max:500',
            'favorite_golf_course' => 'required|string|max:255',
            'profile_picture'=>'nullable'

        ]);
        if($request->file('profile_picture')){
            
            $validated['profile_picture']=$request->file('profile_picture')->store('profile_photos','public');  
        }
        $user=User::find(auth()->user()->id);
        $user->about=$validated['about'];
        $user->favorite_golf_course=$validated['favorite_golf_course'];
        $user->profile_picture=$validated['profile_picture'];
        $user->save();
        return redirect(route('profile'));
    
        
    }

    public function show(Request $request){
        $user=User::find($request->id);
            return view('profiles.show',[
                
                "user"=>$user
            ]);
    
    }
}
