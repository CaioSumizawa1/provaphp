<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $post = post::all;
        return $post;
    }

  
     

     
    public function create(request $request)
    {
        //
    }


     
   
    
    
    public function show(request $request)
    {
        $comment = comment::find($request->id);
        return $comment;
    }

    /**
     */
    public function edit(request $request)
    {
        //
    }


   
     
    public function destroy(request $request)
    {
        $comment = comment::find(request->id);
        $comment->delete();
        
        $request->json([
            "mesagem" => "comentario deletado com sucesso"   
        ],200);
        //
    }
}
