<?php

namespace App\Http\Controllers;
use App\Article;
Use App\User;

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

    public function saveProfilePhoto (Request $request)
    { 
        $id = $request->userId;
        $user =  User::find($id);
        $userName = $user->email;

        $file_data = $request->input('profileImage');
        $savedName = $this->createImageFromBase64($file_data, $userName);
        if($savedName!=""){ // storing image in storage/app/public Folder 
               $user->profile_image = $savedName;
               $user->save();

               $user =  User::find($id);
               return response()->json([
                'status' => 'ok',
                'mensaje' => 'Borrado correctamente',
                'data' => $user,
            ], 200);
         }
         return response()->json([
            'status' => 'error',
            'mensaje' => 'No se pudo actualizar',
            'file_name' => $file_name,
            'file_data' => $file_data,
            'data' => $user,
        ], 200);
     }
    
     public function createImageFromBase64($imageBase64, $userName){ 
		$extension = "";
		if (strpos($imageBase64, 'png') !== false) {
		    $extension = "png";
		}
		if (strpos($imageBase64, 'jpeg') !== false) {
		    $extension = "jpeg";
		}
		if (strpos($imageBase64, 'jpg') !== false) {
		    $extension = "jpg";
        }

        $imageBase64 = str_replace('data:image/'.$extension.';base64,', '', $imageBase64);
        $imageBase64 = str_replace(' ', '+', $imageBase64);
                
        $imageToSave = base64_decode($imageBase64);
        $todayString = date('YmdHis');
        $imageName = $userName."_".$todayString.'.'.$extension; 
        $path = public_path() . "/storage/profiles/" . $imageName;
		file_put_contents($path, $imageToSave);
		return $imageName;
	}
}