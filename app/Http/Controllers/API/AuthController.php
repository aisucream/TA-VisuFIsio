<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
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

        if ($user->type != 'mobile') {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized : User cannot access the API'
            ], 400);
        }

        $token = $user ->createToken('user_token')->plainTextToken;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8','regex:/\d+/'],
            'type' => ['required','string','in:mobile,web'],
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
            $datauser->type = $request->type;
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
