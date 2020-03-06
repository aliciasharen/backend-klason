<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Agama;
use App\Guru;
use App\Murid;
use App\Jabatan;
use App\JurusanTingkatan;
use App\Tugas;
use App\Kelas;
use App\PengurusKelas;
use App\Gelar;
use App\Gender;
use App\Mapel;
use App\Jurusan;
use App\Tingkatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Contracts\Session\Session;

class FetchDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-api');
    }

    public function dataAdmin(){
        $admin = Admin::all();
        return $this->responseApi($admin);
    }
    public function dataMurid(){
        $murid = Murid::all();
        return $this->responseApi($murid);
    }
    public function dataMapel(){
        $dataMapel = Mapel::all();
        return $this->responseApi($dataMapel);
    }
    public function dataGuru(){
        $guru = Guru::all();
        return $this->responseApi($guru);
    }
    public function dataAgama(){
        $agama = Agama::all();
        return $this->responseApi($agama);
    }
    public function dataGelar(){
        $dataGelar = Gelar::all();
        return $this->responseApi($dataGelar);
    }
    public function dataGender(){
        $dataGender = Gender::all();
        return $this->responseApi($dataGender);
    }
    public function dataJabatan(){
        $dataJabatan = Jabatan::all();
        return $this->responseApi($dataJabatan);
    }
    public function dataJurusan(){
        $dataJurusan = Jurusan::all();
        return $this->responseApi($dataJurusan);
    }
    public function dataKelas(){
        $dataKelas = Kelas::all();
        return $this->responseApi($dataKelas);
    }
    public function dataPengurusKelas(){
        $dataPengurusKelas = PengurusKelas::all();
        return $this->responseApi($dataPengurusKelas);
    }
    public function dataTingkatan(){
        $dataTingkatan = Tingkatan::all();
        return $this->responseApi($dataTingkatan);
    }
    public function dataTugas(){
        $dataTugas = Tugas::all();
        return $this->responseApi($dataTugas);
    }


    //DETAIL methods
    public function detailAdmin($id){
        $admin = Admin::find($id);
        return $this->responseApi($admin);
    }
    public function detailMurid($id){
        $murid = Murid::find($id);
        return $this->responseApi($murid);
    }
    public function detailMapel($id){
        $detailMapel = Mapel::find($id);
        return $this->responseApi($detailMapel);
    }
    public function detailGuru($id){
        $guru = Guru::find($id);
        return $this->responseApi($guru);
    }
    public function detailAgama($id){
        $agama = Agama::find($id);
        return $this->responseApi($agama);
    }
    public function detailGelar($id){
        $detailGelar = Gelar::find($id);
        return $this->responseApi($detailGelar);
    }
    public function detailGender($id){
        $detailGender = Gender::find($id);
        return $this->responseApi($detailGender);
    }
    public function detailJabatan($id){
        $detailJabatan = Jabatan::find($id);
        return $this->responseApi($detailJabatan);
    }
    public function detailJurusan($id){
        $detailJurusan = Jurusan::find($id);
        return $this->responseApi($detailJurusan);
    }
    public function detailKelas($id){
        $detailKelas = Kelas::find($id);
        return $this->responseApi($detailKelas);
    }
    public function detailPengurusKelas($id){
        $detailPengurusKelas = PengurusKelas::find($id);
        return $this->responseApi($detailPengurusKelas);
    }
    public function detailTingkatan($id){
        $detailTingkatan = Tingkatan::find($id);
        return $this->responseApi($detailTingkatan);
    }
    public function detailTugas($id){
        $detailTugas = Tugas::find($id);
        return $this->responseApi($detailTugas);
    }





}
