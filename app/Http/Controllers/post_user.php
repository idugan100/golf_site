<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\post_user as ModelsPost_user;
use Illuminate\Support\Facades\Auth;

class post_user extends Controller
{
    public function store(Request $request){
        
        $like=new ModelsPost_user();
        $like->post_id=$request->post_id;
        $like->user_id=auth()->user()->id;
        try{
            $like->save();
        } catch (Exception $ex) {
            $oldlike=ModelsPost_user::where('user_id',Auth::id())->where('post_id',$request->post_id)->get();
            
            ModelsPost_user::destroy($oldlike[0]->id);
        }
        
        
        return redirect(route('posts.index'));
    }
}
