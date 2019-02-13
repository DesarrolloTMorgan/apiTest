<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use function GuzzleHttp\json_decode;

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
        $article = Article::findOrFail($id);
        $isDeleted = $article->delete();
        if($isDeleted){
            return response()->json([
                'status' => 'ok',
                'mensaje' => 'Borrado correctamente',
            ], 204);
        }
        return response()->json([
            'status' => 'error',
            'mensaje' => 'No se pudo borrar',
        ], 204);
    }

    public function getAll(){
        $articles = Article::all();
        return response()->json([
            'status' => 'ok',
            'data' => $articles->toArray(),
        ]);
    }

    public function manageArticles (Request $request)
    {
        // $object = json_decode(json_encode((object) $request->data), FALSE);
        // print_r($object->article->title);
        $data = $request->article;
        $tipo = $request->type;
        if($tipo == "newArticle"){
            $article = new Article;
            $article->title = $data['title'];
            $article->body = $data['body'];
            $article->save();
            return response()->json([
                'status'=>'ok',
                'data' => $article,
            ], 200);
        } elseif ($tipo == "getAll") {
            return $this->getAll();
        } elseif ($tipo == "delete") {
            return $this->delete($request, $data['id']);
        } else {
            return response()->json([
                'status'=>'error',
                'message'=>'tipo no reconocido',
                'data' => 'todo mal prro :(',
            ], 200);
        }
    }
}
