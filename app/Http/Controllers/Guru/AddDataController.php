<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tugas;
use App\Guru;
use App\Murid;
use App\Kelas;

class AddDataController extends Controller
{
	public function __construct(){
		$this->middleware('auth:guru-api');
	}


    public function tambahTugas(Request $request){
        $this->validate($request, [
            'nama' => 'required|max:25',
            'deadline' => 'required',
            'guru_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'jurusan_id' => 'required',
            'kategori' => 'required'
        ]);

    	$tugas = Tugas::create([
    		'nama' => $request->nama,
    		'tgl_mulai' => $request->tgl_mulai,
    		'deadline' => $request->deadline,
    		'guru_id' => auth()->guard('guru-api')->user()->id,
    		'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'jurusan_id' => $request->jurusan_id,
            'kategory' => $request->kategori,
            
    	]);
        $kelas_id = $request->kelas_id;
        $tugas_id = $tugas->id;
    	return $this->kelas($kelas_id, $tugas_id);
    }

    public function kelas($kelas, $tugas){
        $kelas = Kelas::find($kelas);
        $murids = $kelas->murid()->pluck('id')->toArray();
        $tugas = Tugas::find($tugas);
        foreach ($murids as $murid => $v) {

            $tugas->Murid()->attach($v);
        }

        return $this->responseApiGuru($tugas);
    }
}
