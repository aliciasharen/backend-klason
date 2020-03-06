<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jabatan;
use App\JurusanTingkatan;
use App\Tugas;
use App\Gelar;
use App\Mapel;
use App\Admin;
use App\Murid;
use App\Jurusan;
use App\Kelas;
use App\Guru;
use App\Agama;
use App\Gender;
use App\PengurusKelas;
use App\TahunAjaran;
use App\Tingkatan;
use App\TingkatPendidikan;

class DeleteDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-api');
    }
    public function deleteDataAgama($id){
        $Agama = Agama::find($id);
        $Agama->delete();
        return $this->responseApiDelete($Agama);
    }
    public function deleteDataGelar($id){
        $Gelar = Gelar::find($id);
        $Gelar->delete();
        return $this->responseApiDelete($Gelar);
    }
    public function deleteDataGender($id){
        $Gender = Gender::find($id);
        $Gender->delete();
        return $this->responseApiDelete($Gender);
    }
    public function deleteDataJabatan($id){
        $Jabatan = Jabatan::find($id);
        $Jabatan->delete();
        return $this->responseApiDelete($Jabatan);
    }
    public function deleteDataJurusan($id){
        $Jurusan = Jurusan::find($id);
        $Jurusan->delete();
        return $this->responseApiDelete($Jurusan);
    }
    public function deleteDataJurusanTingkatan($id){
        $JurusanTingkatan = JurusanTingkatan::find($id);
        $JurusanTingkatan->delete();
        return $this->responseApiDelete($JurusanTingkatan);
    }
    public function deleteDataKelas($id){
        $Kelas = Kelas::find($id);
        $Kelas->delete();
        return $this->responseApiDelete($Kelas);
    }
    public function deleteDataMapel($id){
        $Mapel = Mapel::find($id);
        $Mapel->delete();
        return $this->responseApiDelete($Mapel);
    }
    public function deleteDataPengurusKelas($id){
        $PengurusKelas = PengurusKelas::find($id);
        $PengurusKelas->delete();
        return $this->responseApiDelete($PengurusKelas);
    }
    public function deleteDataTahunAjaran($id){
        $TahunAjaran = TahunAjaran::find($id);
        if ( TahunAjaran::where('aktif', true) ) {
            return response()->json([
                'response' => 'tidak dapat menghapus tahun ajaran yang sedang aktif',
            ]);
        }
        $TahunAjaran->delete();
        return $this->responseApiDelete($TahunAjaran);
    }
    public function deleteDataTingkatan($id){
        $Tingkatan = Tingkatan::find($id);
        $Tingkatan->delete();
        return $this->responseApiDelete($Tingkatan);
    }
    public function deleteDataTingkatPendidikan($id){
        $TingkatPendidikan = TingkatPendidikan::find($id);
        $TingkatPendidikan->delete();
        return $this->responseApiDelete($TingkatPendidikan);
    }
    public function deleteDataTugas($id){
        $Tugas = Tugas::find($id);
        $Tugas->delete();
        return $this->responseApiDelete($Tugas);
    }

    //delete account
    public function deleteDataAdmin($id){
        $admin = Admin::find($id);
        if (Admin::all()->count() == 1) {
           return response()->json([
               'response' => 'admin tidak bisa dihapus dengan jumlah minimal setidaknya 1 admin tersisa',
           ]);
        }
        $admin->delete();
        return $this->responseApiDelete($admin);
    }
    public function deleteDataMurid($id){
        $murid = Murid::find($id);
        $murid->delete();
        return $this->responseApiDelete($murid);

    }
    public function deleteDataGuru($id){
        $Guru = Guru::find($id);
        $Guru->delete();
        return $this->responseApiDelete($Guru);

    }

}
