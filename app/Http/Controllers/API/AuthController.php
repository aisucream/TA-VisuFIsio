<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                "message"=> "Proses Login Gagal",
                'data' => $validator->errors()->first(),
            ],401); 
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'=> false,
                'message'=> 'Email atau Password Tidak Sesuai'
            ],401);
        }

        $token = $user ->createToken('user_token')->plainTextToken;
        return response()->json([
            'status'=> true,
            'massage' => "Berhasil Login",
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
                'message' => 'Proses Validasi Gagal',
                'data' => $validator->errors()->first(),
            ], 401);
        }
            $datauser->name = $request->name;
            $datauser->email = $request->email;
            $datauser->password = bcrypt($request->password);
            $datauser->save();

            return response()->json([
                'status'=> true,
                'message'=> 'User Berhasil Didaftarkan',
            ],200);
    }

     public function logOut(Request $request){

        $request->user()->currentAccessToken()->delete();
        
        return response()->json([
            'status'=> true,
            'message'=> 'Berhasil Logout',
        ],200);
    }


}
