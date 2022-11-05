<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $friends=DB::select('SELECT users.name,f2.user_id_one  FROM friends f1, friends f2, users WHERE f1.user_id_one=f2.user_id_two and f1.user_id_two=f2.user_id_one and f1.user_id_one=? AND f2.user_id_one=users.id;',[auth()->user()->id] );
        
        return view('profiles.user_profile',[
            'friends'=>$friends
        ]);
    }

       
 
    public function explore(){
        $not_friends=DB::select(
            'SELECT u2.id, u2.name 
            from users u1, users u2 
            where 
                not EXISTS(SELECT 1 
                            From friends f
                             where f.user_id_one=u1.id and f.user_id_two=u2.id ) 
                and not EXISTS (SELECT 1 
                                from friends f 
                                where f.user_id_one=u2.id and f.user_id_two=u1.id)  
                and u1.id != u2.id and u1.id=?',[auth()->user()->id]);

        $friends=DB::select(
            'SELECT users.name,f2.user_id_one  
            FROM friends f1, friends f2, users 
            WHERE f1.user_id_one=f2.user_id_two and f1.user_id_two=f2.user_id_one 
                and f1.user_id_one=? AND f2.user_id_one=users.id;',[auth()->user()->id] );
         
         $requesting=DB::select(
            'SELECT u2.id, u2.name 
            from users u1, users u2 
            where 
                not EXISTS(SELECT 1 
                            From friends f
                             where f.user_id_one=u1.id and f.user_id_two=u2.id ) 
                and  EXISTS (SELECT 1 
                                from friends f 
                                where f.user_id_one=u2.id and f.user_id_two=u1.id)  
                and u1.id != u2.id and u1.id=?',[auth()->user()->id]);
        $pending=DB::select('
        SELECT u2.id, u2.name 
        from users u1, users u2 
        where 
             EXISTS(SELECT 1 
                        From friends f
                         where f.user_id_one=u1.id and f.user_id_two=u2.id ) 
            and not EXISTS (SELECT 1 
                            from friends f 
                            where f.user_id_one=u2.id and f.user_id_two=u1.id)  
            and u1.id != u2.id and u1.id=?',[auth()->user()->id]);
        return view('profiles.explore',[
            'pending'=>$pending,
            'requesting'=>$requesting,
            'friends'=>$friends,
            'others'=>$not_friends
        ]);

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
        if($request->file('profile_picture')){
        $user->profile_picture=$validated['profile_picture'];
        }
        $user->save();
        return redirect(route('profile'));
    
        
    }

    public function show(Request $request){
        $user=User::find($request->id);
        $friends=DB::select('SELECT users.name,f2.user_id_one  FROM friends f1, friends f2, users WHERE f1.user_id_one=f2.user_id_two and f1.user_id_two=f2.user_id_one and f1.user_id_one=? AND f2.user_id_one=users.id;',[$request->id] );

            return view('profiles.show',[
                
                "user"=>$user,
                'friends'=>$friends
            ]);
    
    }
}
