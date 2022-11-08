<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//query to return a users friends using user id
//SELECT users.name as 'friend name',f2.user_id_one as 'friend id' 
//FROM friends f1, friends f2, users 
//WHERE f1.user_id_one=f2.user_id_two and f1.user_id_two=f2.user_id_one and f1.user_id_one=? AND f2.user_id_one=users.id; 

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated=$request->validate(
            [
                'friend_id'=>'required',
                'user_id'=>'nullable'
            ]
            );
        $validated['user_id']=auth()->user()->id;
        
        $friend=new Friend();
        $friend->user_id_one=$validated['user_id'];
        $friend->user_id_two=(int)$validated['friend_id'];
        
        $friend->save();
        return( redirect(route('profile.explore')));
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }

    public function reject(Request $request){
        
        Friend::where('user_id_two',auth()->user()->id)
                ->where('user_id_one',$request->friend_id)->delete();
        return(redirect(route('profile.explore')));
    }
}
