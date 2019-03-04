<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends BaseController
{
    function index(Request $request){
    	//$user = new User();
    	//$user->name = 'Esmeralda';
    //	$user->email = 'esmeralda@webtraining.zone';
 //   	if($request->isJson()){
    	$users = User::all();

    	return response()->json($users,200);
    	
    	
    //	return response()->json(['error'=>'Unauthorized'],401,[]);
  }

    function createUser(Request $request){
   
    		// CREATE USER IN DATABASE
    		$data = $request->json()->all();

    		$user = User::create([
    			'name' => $data['name'],
    			'username' => $data['username'],
    			'email' => $data['email'],
    			'password' => Hash::make($data['password']),
    			'api_token' => str_random(60),
                'age' => $data['age']
    		]);
    		return response()->json($user,201);
  
    }

    function getToken(Request $request){
    	
    		// CREATE USER IN DATABASE
    		$data = $request->json()->all();
    		try{
    			$user = User::where('username',$data['username'])->first();
    			if($user && Hash::check($data['password'],$user->password)){
    				return response()->json($user,200);
    			}
    			else{
    				return response()->json(['error'=>'No content'],406);
    			}
    		}
    		catch(ModelNotFoundException $e){
    			return response()->json(['error'=>'No content'],406);
    		}
    
    }


    public function getPhone($id){
      $phone = User::find($id)->phone;
      $user = User::find($id);


      return response()->json(['numero' => $phone->numero,"name" => $user->name]);
    }

    //
}
