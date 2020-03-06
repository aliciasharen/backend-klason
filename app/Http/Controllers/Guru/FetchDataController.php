<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guru;
use App\GuruKelas;
use App\Tugas;
use App\Kelas;

class FetchDataController extends Controller
{
    //authentication
    public function __construct()
    {
        $this->middleware('auth:guru-api');
    }

    public function dashboard(){

        $kelasid = [];
        $selesai = [];

        $user = auth()->guard('guru-api')->user();
        $kelas = Guru::find(auth()->guard('guru-api')->user()->id );
        $gurukelas = $kelas->Kelas->count();
        //ambil nilai column kelas_id
        $kelasid =  GuruKelas::where('guru_id', auth()->guard('guru-api')->user()->id )->pluck('kelas_id')->toArray();
        $siswa = Kelas::whereIn('id', $kelasid)->count(); 
        //guru_tugas count
        $tugas = Guru::find(auth()->guard('guru-api')->user()->id);
        $tugasCount = $tugas->Tugas->count();
        //tugas belum selesai
        $tugasBelumSelesai = $tugas->Tugas()->where('selesai', false)->count();
        //task progess
        $guruTugas = Guru::find(auth()->guard('guru-api')->user()->id);
        $task_progress = $guruTugas->Tugas()->where('selesai', false)->select('nama', 'id')->get();
        
        //profil guru
        $kelas = $tugas->Kelas()->select('kelas')->take(3)->get();
        $tugas2 = $tugas->Tugas()->select('nama')->where('selesai', false)->take(3)->get();
        $inputnilai = $tugas->Tugas()->select('nama')->where('selesai', false)->take(3)->get();

        //task progress siswa
        $siswatugas = $guruTugas->Tugas()->where('selesai', false)->orderBy('deadline', 'asc')->pluck('id')->toArray();
        foreach ($siswatugas as $st => $v ) {
           $findTugas = $guruTugas->tugas()->find($v);
           $findTugas2 = $findTugas->Murid()->where('selesai_murid', true)->count();
           $jumlahSiswa = $findTugas->Murid()->count();
           $selesai[$v] = $findTugas2 .'/'. $jumlahSiswa;
        }
        
        $response = [
            'user' => $user,
            'gurukelas' => $gurukelas,
            'kelasid' => $kelasid,
            'jumlah_siswa' => $siswa,
            'tugasCount' => $tugasCount,
            'tugas_belum_selesai' => $tugasBelumSelesai,
            'task_progress' => $task_progress,
            'kelas_guru' => $kelas,
            'tugas_guru' => $tugas2,
            'input_nilai' => $inputnilai,
            'selesai/siswa' => $selesai,
        ];
        return $this->responseApiGuru($response);
    }

    public function profilGuru(){
        $guru = auth()->guard('guru-api')->user();
        return $this->responseApiGuru($guru);
    }
    public function formCreateTugas(){
        $guru = auth()->guard('guru-api')->user();
        $response = [
            'user' => $guru,
        ];

        return $this->responseApiGuruWithoutUser($response);
    }

    public function riwayat(){
        $guru = Guru::find(auth()->guard('guru-api')->user()->id);
        $riwayat = $guru->Tugas()->where('selesai', true)->get();

        $response = [
            'riwayat' => $riwayat
        ];

        return $this->responseApiGuru($response);
    }
    public function updateTugas($id){
        $tugas = Tugas::find($id);

        return $this->responseApiGuru($tugas);

    }
    public function detailTugas($id){
        $tugas = Tugas::find($id);
        $mapel = $tugas->Mapel()->pluck('nama')->toArray();

        $response = [
            'tugas' => $tugas,
            'mapel' => $mapel,
        ];

        return $this->responseApiGuru($response);
    }
    public function listKelas(){
        $kelas = [];
        $muridCount = [];
        $tugasCount = [];


        $guru = Guru::find(auth()->guard('guru-api')->user()->id);
        $kelas = $guru->Kelas()->get();
        $kelasArr = $guru->kelas()->pluck('kelas_id')->toArray();

        foreach ($kelasArr as $ka => $v) {
            $findKelas = Kelas::find($v);
            $kelasMurid = $findKelas->Murid()->count();
            $kelasTugas = $findKelas->Tugas()->where('selesai', false)->count();
            $kelas[$v] = $findKelas;
            $muridCount[$v] = $kelasMurid;
            $tugasCount[$v] = $kelasTugas;

        }
        $response = [
            'kelas' => [
                'kelas' => $kelas,
                'muridCount' => $muridCount,
                'tugasCount' => $tugasCount,
            ]
        ];
        return $this->responseApiGuru($response);
    }

    public function listTugas(){
        $guru = Guru::find(auth()->guard('guru-api')->user()->id);
        $tugas = $guru->Tugas()->where('selesai', false)->orderBy('deadline', 'asc')->get();
        $tugasArr = $guru->Tugas()->pluck('id')->toArray();

        foreach ($tugasArr as $key => $v) {
            $findTugas = Tugas::find($v);
            $selesai = $findTugas->Murid()->where('selesai_murid', true)->count();
            $belumSelesai = $findTugas->Murid()->count();

            $tugas[] = $findTugas;
            $status[] = $selesai.'/'.$belumSelesai;
        }
        $response =  [
            'tugas' => $tugas,
            'status' => $status,
        ];

        return $this->responseApiGuru($response);
    }
    public function openTugas($id){
        //$guru = Guru::find(auth()->guard('guru-api')->user()->id);
        $openTugas = Tugas::find($id);
        $tugas = $openTugas->Murid;
        //kelasTugas
        $kelas = $openTugas->Kelas()->select('kelas')->get();
        //mapel
        $mapel = $openTugas->Mapel()->select('nama')->get();

        $response = [
            'kelas' => $kelas,
            'mapel' => $mapel,
            'tugas' => $tugas,
        ];

        return $this->responseApiGuru($response);
    }
    public function notifications(){

        $notif = [];


        $guru = Guru::find(auth()->guard('guru-api')->user()->id);
        $tugas = $guru->Tugas()->where('selesai', false)->pluck('id')->toArray();
        //$notif = $tugas->Murid()->get();
        foreach ($tugas as $t => $v) {
            $findTugas = Tugas::find($v);
            $findTugas2 = $findTugas->Murid()->select('nama_depan')->orderBy('pengumpulan', 'asc')->get();
            $notif[] = $findTugas2;
        }

        return $this->responseApiGuru($notif);
    }

    public function openTugasMapel($kelas_id, $mapel_id){
        $guru = auth()->guard('guru-api')->user()->id;
        $kelas = Kelas::find($kelas_id);
        $tugas = $kelas->Tugas()->where([['mapel_id','=', $mapel_id],
                                        ['selesai', '=', 0],
                                        ['guru_id' ,'=', $guru],
            ])->get();
            //['selesai', false])->get();

        return $this->responseApiGuru($tugas);
    }
    
    public function openKelas($id){
        $guru = auth()->guard('guru-api')->user()->id;
        $kelas = Kelas::find($id);
        $tugas = $kelas->Tugas()->where([['kelas_id','=', $id],
                                        ['selesai', '=', 0],
                                        ['guru_id', '=', $guru],
            ])->get();
            //['selesai', false])->get();

        return $this->responseApiGuru($tugas);
    }
}
