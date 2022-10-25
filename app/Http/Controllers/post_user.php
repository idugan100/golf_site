<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\post_user as ModelsPost_user;

class post_user extends Controller
{
    public function store(Request $request){
        
        $like=new ModelsPost_user();
        $like->post_id=$request->post_id;
        $like->user_id=auth()->user()->id;
        try{
            $like->save();
        } catch (Exception $ex) {
            // jump to this part
            // if an exception occurred
            dd($ex);
        }
        
        
        return redirect(route('posts.index'));
    }
}
