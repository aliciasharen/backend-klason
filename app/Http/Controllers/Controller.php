<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $routeAdmin = ['data_murid' => 'http://127.0.0.1:8000/api/dataMurid',
                'tipe data_murid' => 'GET',
                'data_admin' => 'http://127.0.0.1:8000/api/dataAdmin',
                'tipe data_admin' => 'GET',
                'data_guru' => 'http://127.0.0.1:8000/api/dataGuru',
                'tipe data_guru' => 'GET',
                'data_jabatan' => 'http://127.0.0.1:8000/api/dataJabatan',
                'tipe data_jabatan' => 'GET',
                'tingkatan_pendidikan_data' => 'http://127.0.0.1:8000/api/',
                'tipe' => 'GET',
                'data_gelar' => 'http://127.0.0.1:8000/api/dataGelar',
                'tipe data_gelar' => 'GET',
                'tugas_data' => 'http://127.0.0.1:8000/api/dataTugas',
                'tipe tugas_data' => 'GET',
                'jurusan_data' => 'http://127.0.0.1:8000/api/dataJurusan',
                'tipe jurusan_data' => 'GET',
                'kelas_data' => 'http://127.0.0.1:8000/api/dataKelas',
                'tipe kelas_data' => 'GET',
                'agama_data' => 'http://127.0.0.1:8000/api/dataAgama',
                'tipe agama_data' => 'GET',
                'tingkatan' => 'http://127.0.0.1:8000/api/dataTingkatan',
                'tipe tingkatan_data' => 'GET',
                'mapel_data' => 'http://127.0.0.1:8000/api/dataMapel',
                'tipe mapel_data' => 'GET',
            ];
    public $routeGuru = [
                //NAVBAR
                'home' => 'http://127.0.0.1:8000/api/guru/home',
                'tipe_home' => 'GET',
                'kelas' => 'http://127.0.0.1:8000/api/guru/kelas',
                'tipe_kelas' => 'GET',
                'tugas' => 'http://127.0.0.1:8000/api/guru/tugas',
                'tipe_tugas' => 'GET',
                'riwayat' => 'http://127.0.0.1:8000/api/guru/riwayat',
                'tipe_riwayat' => 'GET',

                //SIDEBAR
                'dashboard' => 'http://127.0.0.1:8000/api/guru/dashboard',
                'tipe_dashboard' => 'GET',
                'tambah_kelas_page' => 'http://127.0.0.1:8000/api/guru/tambahKelasPage',
                'tipe_tambah_kelas_page' => 'GET',
                'buat_tugas' => 'http://127.0.0.1:8000/api/guru/form-create-tugas',
                'tipe_buat_tugas' => 'GET',
                'input_nilai_form' => 'http://127.0.0.1:8000/api/guru/input-nilai',
                'tipe_input_nilai_form' => 'GET',
                'riwayat' => 'http://127.0.0.1:8000/api/guru/riwayat',
                'tipe_riwayat' => 'GET',
                'logout' => 'http://127.0.0.1:8000/api/guru/logout',
                'tipe_logout' => 'POST',
             ];
    protected function responseApi($response){

        $route = $this->routeAdmin;
        return response()->json([
            'status' => 'success',
            'response' => $response,
            'user' => auth()->guard('admin-api')->user(),
            'route' => $route,
            ],200);
    }
    protected function responseApiCreate($response){
        $route = $this->routeAdmin;
        return response()->json([
            'status' => 'create data success',
            'data created' => $response,
            'user' => auth()->guard('admin-api')->user(),
            'redirect' => 'http://127.0.0.1:8000/api/adminDashboard',
            'route' =>$route,
            ],201);
    }
    protected function responseApiDelete($response){
        $route = $this->routeAdmin;
        return response()->json([
            'status' => 'delete success',
            'data deleted' => $response,
            'user' => auth()->guard('admin-api')->user(),
            'route' => $route,
            ],200);
    }


    //GURU
    protected function responseApiGuru($response){
        $route = $this->routeGuru;
        return response()->json([
            'success' => true,
            'data' => $response,
            'user' => auth()->guard('guru-api')->user(),
            'route' => $route,
        ], 200);
    }
     protected function responseApiGuruWithoutUser($response){
        $route = $this->routeGuru;
        return response()->json([
            'success' => true,
            'data' => $response,
            'route' => $route,
        ], 200);
    }

    protected function responseApiPost($response){
        $route = $this->routeGuru;
        return response()->json([
            'success' => true,
            'message' => 'Tugas berhasil dibuat!',
            'data' => $response,
            'user' => auth()->guard('guru-api')->user(),
            'route' => $route,
        ], 201);
    }

    protected function responseApiUpdateGuru($response){
        $route = $this->routeGuru;
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate!',
            'data' => $response,
            'user' => auth()->guard('guru-api')->user(),
            'route' => $route,
        ], 201);
    }

    public function responseApiDeleteGuru($response){
        $route = $this->routeGuru;
        return response()->json([
            'success' => true,
            'message' => 'Tugas berhasil dihapus!',
            'data' => $response,
            'user' => auth()->guard('guru-api')->user(),
            'route' => $route,
        ], 200);
    }
    protected function responseApiMurid($response){
        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $response
        ],200);
    }
}
