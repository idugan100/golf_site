<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\post_user as ModelsPost_user;
use Illuminate\Http\Request;

class post_user extends Controller
{
    public function store(Request $request){
        dd($request->post_id);
        

    }
}
