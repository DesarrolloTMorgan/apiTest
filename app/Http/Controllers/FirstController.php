<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;
use App\Models\Customer;

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

    public function testEmpty(Request $request)
    {
        $customers = Customer::count('id');

        if($customers == '0')
        {
            return response()->json([
                'data' => 'empty'
            ]);
        } else {
            return response()->json([
                'data' => $customers
            ]);
        }

    }
}
