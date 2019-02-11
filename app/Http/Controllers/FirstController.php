<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    //

    public function BasicResponse($var = null)
    {
        $articulos = Article::all();
        $articulos = array('articulos'=>$articulos);
        //dd($articulos);
        $jsonArticulos = json_encode($articulos);
        echo print_r("<pre>".$jsonArticulos."</pre>",1);
    }
}
