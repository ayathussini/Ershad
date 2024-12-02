<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $fields=$request->validate([
            "name"=>"required|max:100",
            "email"=>"required|email|unique:users|max:100",
            "password"=>"required|confirmed|min:8|max:100"

        ]);


        $user=User::create($fields);

        $token = $user->createToken($request->name);





        return [
            "user"=>$user,
            "token"=>$token->plainTextToken
        ];

    }





    // $request->validate([
    //     'email'=>"required|email|exists:users|max:100",
    //     'password'=>"required|max:100",
    // ]);


    // $user=User::where("email",$request->email)->first();

    // if(!$user ||  !Hash::check($request->password,$user->password)){

    //     return[
    //         "errors"=>[
    //             "email"=>["the provided data is not correct"]
    //         ]
    //     ];

    // }

    // $token = $user->createToken($user->name);

    // return [
    //     'user'=>$user,
    //     "token" =>$token->plainTextToken
    // ];

    public function login(Request $request){

        $request->validate([
            "email"=>"required|email|max:100|exists:users",
            "password"=>"required|min:8|max:100"
        ]);

        $user = User::where("email",$request->email)->first();

        if( !$user || !Hash::check($request->password,$user->password)){

            return[
                "errors"=>[
                    "email"=>["the provided data is not correct"]
                ]
                ];
        }

        $token=$user->createToken($user->name);

        return [
            'user'=>$user,
            "token" =>$token->plainTextToken
        ];

    }





    public function logout(Request $request){


        $request->user()->tokens()->delete();

        return[
            "massage"=>"you are logged out"
        ];
    }
}
