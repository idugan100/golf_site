<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index',[
            'posts'=>Post::with('user')->latest()->get()
        ]);
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
        $validated=$request->validate([

            'message' => 'required|string|max:255',
            'picture'=>'nullable'
        ]);
        

 
       
      
        
        if($request->file('picture')&&$request->removePhoto){
            
            $validated['picture']=$request->file('picture')->store('photos','public');
            
        }
        
        $request->user()->posts()->create($validated);
 

        return redirect(route('posts.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return('hello show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   $this->authorize('update',$post);
        return view('posts.edit',[
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   

        $this->authorize('update', $post);
        

 

        $validated = $request->validate([

            'message' => 'required|string|max:255',
            'picture'=>'nullable'

        ]);
        if($request->file('picture')){
            
            $validated['picture']=$request->file('picture')->store('photos','public');
            
        }
        if($request->removePhoto){
            $post->update(["picture"=>NULL,
            "message"=>$request->message]);
        }
        else{
            $post->update($validated);
        }
 

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect(route('posts.index'));
    }
}
