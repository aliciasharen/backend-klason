<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use Illuminate\Http\Request;

class AddDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-api');
    }
    public function tambahAgama(Request $request){
        $agama = Agama::create([
            'nama' => $request->nama,
        ]);
        return $this->responseApiCreate($agama);
    }
    public function tambahGelar(Request $request){
        
        $gelar = Gelar::create([
            'nama' => $request->nama,
            'desc' => $request->desc,
        ]);
        return $this->responseApiCreate($gelar);
    }
    public function tambahGender(Request $request){
        $gender = Gender::create([
            'name' => $request->nama,
            'alfabet' => $request->alfabet,
        ]);
        return $this->responseApiCreate($gender);
    }
    public function tambahJabatan(Request $request){
        $jabatan = Jabatan::create([
            'nama' => $request->nama,
            'nama_panjang' => $request->nama_panjang,
            'desc' => $request->desc,
        ]);
        return $this->responseApiCreate($jabatan);
    }
    public function tambahJurusan(Request $request){
        $jurusan = Jurusan::create([
            'nama' => $request->nama,
            'nama_panjang' => $request->nama_panjang,
            'urutan' => $request->urutan,
        ]);
        return $this->responseApiCreate($jurusan);
    }
    public function tambahMapel(Request $request){
        $mapel = Mapel::create([
            'nama' => $request->nama,
            'nama_panjang' => $request->nama_panjang,
        ]);
        return $this->responseApiCreate($mapel);
    }
    public function tambahPengurusKelas(Request $request){
        $penguruskelas = PengurusKelas::create([
            'nama' => $request->nama,
        ]);
        return $this->responseApiCreate($penguruskelas);
    }
    public function tambahTahunAjaran(Request $request){
        $tahunajaran = TahunAjaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'mulai' => $request->mulai,
            'sampai' => $request->sampai,
            'aktif' => false,
        ]);
        return $this->responseApiCreate($tahunajaran);
    }
    public function tambahTingkatan(Request $request){
        $tingkatan = Tingkatan::create([
            'tingkatan' => $request->tingkatan,
            'alfabet' => $request->alfabet,
            'romawi' => $request->romawi,
        ]);
        return $this->responseApiCreate($tingkatan);
    }
    public function tambahTingkatPendidikan(Request $request){
        $tingkatpendidikan = TingkatPendidikan::create([
            'nama' => $request->nama,
            'nama_panjang' => $request->nama_panjang,
            'desc' => $request->desc,
        ]);
        return $this->responseApiCreate($tingkatpendidikan);
    }
    public function tambahKelas(Request $request){
        // $tingkatan = Tingkatan::find($request->tingkatan_id)->select('romawi')->get();
        // $jurusan = Jurusan::find($request->jurusan_id)->select('nama')->get();
        // $urutan = Jurusan::find($request->jurusan_id)->select('urutan')->get();
        $kelas = Kelas::create([
            'kelas' => $request->tingkatan .'-'. $request->jurusan,
            'tingkatan_id' => $request->tingkatan_id,
            'jurusan_id' => $request->jurusan_id,
            'nama_panjang' => $request->nama_panjang,
        ]);
        return $this->responseApiCreate($kelas);
    }
    //add account
    public function tambahMurid(Request $request){
        $murid = Murid::create([
            'nis' => $request->nis,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'token' => null,
            'password' => $request->password,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'nama_wali' => $request->nama_wali,
            'no_tlp_wali' => $request->no_tlp_wali,
            'alamat_wali' => $request->alamat_wali,
            'gender' => $request->gender,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'pengurus_kelas' => $request->pengurus_kelas,
            'agama' => $request->agama,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return $this->responseApiCreate($murid);
    }

    public function tambahGuru(Request $request){
        $guru = Guru::create([
            'nip' => $request->nip,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'token' => null,
            'tgl_lahir' => $request->tgl_lahir,
            'desc' => $request->desc,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'tingkat_pendidikan' => $request->tingkat_pendidikan,
            'gelar' => $request->gelar,
            'jabatan' => $request->jabatan,
            'wali_kelas' => $request->wali_kelas,
        ]);

        return $this->responseApiCreate($guru);
    }
    public function guruKelas(Request $request){
        $guru = Guru::find($request->guru_id);

        $guru->Kelas()->attach($request->kelas_id);

        return $this->responseApiCreate($guru);
    }
    public function guruMapel(Request $request){
        $guru = Guru::find($request->guru_id);

        $guru->Mapel()->attach($request->mapel_id);

        return $this->responseApiCreate($guru);
    }
}
