<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Jabatan;
use App\JurusanTingkatan;
use App\Tugas;
use App\Gelar;
use App\Mapel;
use App\Admin;
use App\Murid;
use App\Jurusan;
use App\Guru;
use App\Agama;
use App\Tingkatan;
use phpDocumentor\Reflection\Types\This;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin',[
    //         'except' => 'adminLogin',
    //                     'formLogin',
    //                     'getDataDashboard',
    //                     'tambahAdmin',

    //     ]);
    // }

    public function formLogin(){
        $admin = [
            'halaman' => 'Admin Login',
            'Href' => [
                'login' => 'http://127.0.0.1:8000/api/adminLogin',
                'type_login' => 'POST',
                'forgot_assword' => 'http://127.0.0.1:8000/api/adminForgotPassword',
                'type_forgot_password' => 'GET',
            ]
        ];
        return response()->json($admin);
    }
    public function adminLogin(Request $request){
        // $admin = null;
        // $email = $request->email;
        // $credentials = $request->only('email', 'password');
        // if (! Auth::guard('admin')->attempt($credentials)) {
        //     return response()->json([
        //         'success' => false,
        //         'tipe' => 'unauthenticated',
        //     ]);
        // }
        // $admin = Auth::guard('admin')->user();
        // return $this->getDataDashboard($admin);
        $email = $request->email;
        $credentials = request(['email', 'password']);

        if (! auth()->guard('admin')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // $admin = Admin::where('email', $email)->update(['token' => $token]);
        // $dataAdmin = Admin::where('email', $email)->get();
        $token = auth()->guard('admin')->user()->createToken('authToken')->accessToken;
        //auth()->guard('admin')->user()
        $response = [
            'token' => $token,
            'data admin' => auth()->guard('admin')->user()
        ];
        return $this->responseApi($response);

    }
    public function tambahAdmin(Request $request){
        $admin = Admin::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'gender_id' => $request->gender,
            'agama' => $request->agama,
        ]);
        $token = $admin->createToken('authToken')->accessToken;
        return $this->responseApiCreate(['admin' => $admin,
                                         'token' => $token]);
    }
    public function getDataDashboard($params){
        $dashboard = Admin::all()->count();
        $murid = Murid::all()->count();
        $jurusan = Jurusan::all()->count();
        $kelas = JurusanTingkatan::all()->count();
        $guru = Guru::all()->count();
        $jabatan = Jabatan::all()->count();
        $tugas = Tugas::all()->count();
        $mapel = Mapel::all()->count();
        $gelar = Gelar::all()->count();
        $agama = Agama::all()->count();
        $tingkatan = Tingkatan::all()->count();
        $response = [
            'success' => true,
            'tipe' => 'authenticated',
            'admin' => $params,
            'redirect' => 'http://127.0.0.1:8000/api/adminDashborard/{token}',
            'jumlah_admin' => $dashboard,
            'jumlah_murid' => $murid,
            'jumlah_jurusan' => $jurusan,
            'jumlah_agama' => $agama,
            'jumlah_kelas' => $kelas,
            'jumlah_tingkatan' => $tingkatan,
            'jumlah_guru' => $guru,
            'jumlah_jabatan' => $jabatan,
            'jumlah_gelar' => $gelar,
            'jumlah_tugas' => $tugas,
            'jumlah_mapel' => $mapel
        ];
        return $this->responseApi($response);
    }
    public function adminLogout(){
        $a = Auth::guard('admin-api')->user()->token()->revoke();
        return response()->json($a);
    }
    public function migrasiTahunAjaran(Request $request){
        //
    }
}
