<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function formLogin(){
        return response()->json([
            'success' => true,
            'data' => 'Login Guru',
            'route' => [
                'login' => 'http://127.0.0.1:8000/api/login',
                'tipe_login' => 'POST',
                'forgot_password' => 'http://127.0.0.1:8000/api/password/form-email',
                'tipe_forgot_password' => 'GET',
            ]
        ], 200);
    }
    public function GuruLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $email = $request->email;
        $credentials = request(['email', 'password']);

        if (!$token = auth()->guard('guru-api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // $admin = Admin::where('email', $email)->update(['token' => $token]);
        // $dataAdmin = Admin::where('email', $email)->get();
        //$token = auth()->guard('guru')->user()->createToken('authToken')->accessToken;
        //auth()->guard('admin')->user()
        $response = [
            'token' => $token,
            'data' => auth()->guard('guru-api')->user()
        ];
        return $this->responseApiGuru($response);
    }
    // public function formRegister(){
    //     return response()->json([
    //         'success' => true,
    //         'data' => 'Register Guru',
    //     ], 200);
    // }
    // public function registerGuru(Request $request){
    //     $this->validate($request[
    //         ''
    //     ])
    // }
    public function logout(){
        $guru = Auth::guard('guru-api')->logout();
        return response()->json($guru);
    }
}
