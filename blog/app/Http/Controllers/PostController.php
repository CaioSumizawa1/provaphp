<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index(request $request)
    {
        $post = post::all;
        return $post;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    { 
      $post = new post; 
      $post->usuario = $request->usuario;
      $post->titulo = $request->titulo;
      $post->descreicao = $request->descricao;
      $post->save();
      
      $request->json([
        "mesagem" => "post criado com sucesso"   
    ],200);
    }
    

    /**
     * Store a newly created resource in storage.
     *

     */

    /**
     * Display the specified resource.
     *
     */
    public function show(request $request)
    {
        $post = post::find($request->id);
        return $post;
        
        //
    
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(request $request)
    {
       $post = post::find(request->id);
       $post->usuario = $request->usuario;
       $post->titulo = $request->titulo;
       $post->descreicao = $request->descricao;
      
      $request->json([
        "mesagem" => "postagem Atualizdo com sucesso"   
    ],200);
        //
    }

    /**

     */
    
    public function destroy(post $post)
    {
        $post = post::find(request->id);
        $post->delete();
        
        $request->json([
            "mesagem" => "post deletado com sucesso"   
        ],200);
        //
    }
}
