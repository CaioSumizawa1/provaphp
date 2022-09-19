<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /*Mostrar  todos*/
    public function index(Request $request)
    {
        return Post::all();
    }

    /*creiar post*/

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'usuario' => ['required', 'max:20'],
            'titulo' => ['required', 'max:30'],
            'descricao' => ['required', 'max:255'],

        ]);


        if(!$validated->fails()){


            $post = new Post;

            $post->usuario = $request->usuario;
            $post->titulo = $request->titulo;
            $post->descricao = $request->descricao;

            $post->save();

            return response()->json([
                "message" => "Seu post foi enviado"
            ], 201);

        } else {

        return response()->json([
            "message" => $validated->errors()->all()
        ], 500);
        }
    }

    /* Mostrar um post*/
    public function show(Request $request, $id)
    {
        if (Post::where('id', $id)->exists()) {
            $post = Post::find($id);
            
            return response($post, 200);
          } else {
            return response()->json([
              "message" => "Post não encontrado"
            ], 404);
          }
    }

    /*Editar post*/
    public function edit(Request $request, $id)
    {
        if (Post::where('id', $id)->exists()) {

            $post = Post::find($id);
            $post->titulo = is_null($request->titulo) ? $post->titulo : $request->titulo;
            $post->descricao = is_null($request->descricao) ? $post->descricao : $request->descricao;
            $post->save();

            return response()->json([
                "message" => "Post editado com sucesso"
            ], 200);

            } else {
            return response()->json([
                "message" => "Post não encontrado"
            ], 404);

        }
    }

    /*deletar post.*/
    public function destroy(Request $request, $id)
    {
        if(Post::where('id', $id)->exists()) {
            $post = Post::find($id);
            $post->delete();
            return response()->json([
              "message" => "Post apagado com sucesso"
            ], 202);
          } else {
            return response()->json([
              "message" => "Post não encontrado"
            ], 404);
          }
    }
}