<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Guru;
use App\Tugas;
use Illuminate\Http\Request;

class UpdateDataController extends Controller
{
     //authentication
    public function __construct()
    {
        $this->middleware('auth:guru-api');
    }

    public function updateTugas(Request $request, $id){
    	$request->all();
    	$this->validateRequest($request);
    	$tugas = Tugas::find($id)->update([
    		'nama' => $request->nama,
    		'tgl_mulai' => $request->tgl_mulai,
    		'deadline' => $request->deadline,
    		'kelas_id' => $request->kelas_id,
    		'mapel_id' => $request->mapel_id,
    		'jurusan_id' => $request->jurusan_id,
    		'kategory' => $request->kategory,
    		'desc' => $request->desc,
    	]);
    	return $this->responseApiUpdateGuru($tugas);
    }

    public function validateRequest($request){
    	$this->validate($request,[
    		'nama' => 'required|max:20',
    		'tgl_mulai' => 'required',
    		'deadline' => 'required',
    		'kelas_id' => 'required',
    		'mapel_id' => 'required',
    		'jurusan_id' => 'required',
    	]);
    }
    public function deleteTugas($id){
    	$tugas = Tugas::find($id);
        $tugas->Murid()->detach();
    	$deleteTugas = $tugas->delete();

    	return $this->responseApiDeleteGuru($deleteTugas);
    }

    public function doneTugas($id){
        $tugas = Tugas::find($id);
        $tugas->update([
            'selesai' => true,
        ]);
        return $this->responseApiUpdateGuru($tugas);
    }

    public function updateProfile(Request $request){
        $guru = Guru::find(auth()->guard('guru-api')->user()->id);
        $guru->update([
            // 'nama_depan' => $request->nama_depan,
            // 'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
        ]);

        return $this->responseApiUpdateGuru($guru);
    }
}
