<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function formLogin(){
        return response()->json([
            'success' => true,
            'data' => 'Login Murid',
            'route' => [
                'login' => 'http://127.0.0.1:8000/api/login',
                'tipe_login' => 'POST',
                'forgot_password' => 'http://127.0.0.1:8000/api/password/form-email',
                'tipe_forgot_password' => 'GET',
            ]
        ], 200);
    }

    public function MuridLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $email = $request->email;
        $credentials = request(['email', 'password']);

        if (!$token = auth()->guard('murid-api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // $admin = Admin::where('email', $email)->update(['token' => $token]);
        // $dataAdmin = Admin::where('email', $email)->get();
        //$token = auth()->guard('guru')->user()->createToken('authToken')->accessToken;
        //auth()->guard('admin')->user()
        $response = [
            'token' => $token,
            'data' => auth()->guard('murid-api')->user()
        ];
        return $this->responseApiMurid($response);
    }
}
