<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function show(Article $article)
    {
        //return Article::find($id);
        return $article;
    }

    public function getArticle($id)
    {
        $article =  Article::find($id)->toArray();
        return response()->json([
            'status' => 'ok',
            'data' => $article,
        ]);
    }

    public function store(Request $request)
    {

        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        return response()->json([
            'status' => 'ok',
            'mensaje' => 'Creado correctamente',
            'data' => $article,
        ]);

        //return Article::create($request->all());
        // $article = Article::create($request->all());
        // return response()->json($article, 201);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $article = Article::findOrFail($id);
        //$article->update($request->all());
        $article->update($request->all());
        return response()->json($article, 200);
    }

    public function delete(Request $request, $id)
    {
        //$article = Article::findOrFail($id);
        $article->delete();
        return response()->json(null, 204);
    }

    public function getAll(){
        $articles = Article::all();
        
        return response()->json([
            'status' => 'ok',
            "data" => $articles->toArray(),
        ]);
    }
}
