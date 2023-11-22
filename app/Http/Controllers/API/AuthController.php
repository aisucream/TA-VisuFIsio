<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $rules = [
            "email"=> "required|email",
            "password"=> "required",
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return response()->json([
                "status"=> false,
                "message"=> "Login Process Failed",
                'data' => $validator->errors()->first(),
            ],400); 
        }
       
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'=> false,
                'message'=> 'Email atau Password not match'
            ],400);
        }

        $abilities = $request->is('api/*') ? ['mobile'] : ['web'];

        $token = $user ->createToken('user_token', $abilities)->plainTextToken;

        return response()->json([
            'status'=> true,
            'message' => "Login Succesfully",
            'user' => $user,
            'token'=> $token,
        ],200);
    }

    public function register(Request $request)
    {
        $datauser = new User();
        $rules = [
            "name"=>"required",
            "email"=> "required|email|unique:users,email",
            "password"=> "required",
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Process Failed',
                'data' => $validator->errors()->first(),
                
            ], 400);
        }
            $datauser->name = $request->name;
            $datauser->email = $request->email;
            $datauser->password = bcrypt($request->password);
            $datauser->save();

            return response()->json([
                'status'=> true,
                'message'=> 'User Registered Successfully',
                'data'=> $datauser
            ],200);
    }

     public function logOut(Request $request){

        $request->user()->currentAccessToken()->delete();
        
        return response()->json([
            'status'=> true,
            'message'=> 'Logout Sucessfuly',
            'user' => $request->user,
        ],200);
    }


}
