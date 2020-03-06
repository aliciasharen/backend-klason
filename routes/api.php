<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route untuk sistem bagian Authentikasi admin
Route::get('/', 'Admin\AdminController@formLogin');
Route::post('/adminLogin', 'Admin\AdminController@adminLogin');
Route::post('/adminLogout', 'Admin\AdminController@adminLogout');
Route::group([
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'Admin\PasswordResetController@create');
    Route::get('find/{token}', 'Admin\PasswordResetController@find');
    Route::post('reset', 'Admin\PasswordResetController@reset');
});
//Route fetch data (page admin)
Route::get('/dataMurid', 'Admin\FetchDataController@dataMurid');
Route::get('/dataMapel', 'Admin\FetchDataController@dataMapel');
Route::get('/dataAdmin', 'Admin\FetchDataController@dataAdmin');
Route::get('/dataGuru', 'Admin\FetchDataController@dataGuru');
Route::get('/dataAgama', 'Admin\FetchDataController@dataAgama');
Route::get('/dataGelar', 'Admin\FetchDataController@dataGelar');
Route::get('/dataGender', 'Admin\FetchDataController@dataGender');
Route::get('/dataJabatan', 'Admin\FetchDataController@dataJabatan');
Route::get('/dataJurusan', 'Admin\FetchDataController@dataJurusan');
Route::get('/dataKelas', 'Admin\FetchDataController@dataKelas');
Route::get('/dataPengurusKelas', 'Admin\FetchDataController@dataPengurusKelas');
Route::get('/dataTingkatan', 'Admin\FetchDataController@dataTingkatan');
Route::get('/dataTugas', 'Admin\FetchDataController@dataTugas');
//Route fetch DETAIL (page admin)
Route::group([
    'prefix' => 'detail'
], function(){
    Route::get('/detailMurid/{id}', 'Admin\FetchDataController@detailMurid');
    Route::get('/detailMapel/{id}', 'Admin\FetchDataController@detailMapel');
    Route::get('/detailAdmin/{id}', 'Admin\FetchDataController@detailAdmin');
    Route::get('/detailGuru/{id}', 'Admin\FetchDataController@detailGuru');
    Route::get('/detailAgama/{id}', 'Admin\FetchDataController@detailAgama');
    Route::get('/detailGelar/{id}', 'Admin\FetchDataController@detailGelar');
    Route::get('/detailGender/{id}', 'Admin\FetchDataController@detailGender');
    Route::get('/detailJabatan/{id}', 'Admin\FetchDataController@detailJabatan');
    Route::get('/detailJurusan/{id}', 'Admin\FetchDataController@detailJurusan');
    Route::get('/detailKelas/{id}', 'Admin\FetchDataController@detailKelas');
    Route::get('/detailPengurusKelas/{id}', 'Admin\FetchDataController@detailPengurusKelas');
    Route::get('/detailTingkatan/{id}', 'Admin\FetchDataController@detailTingkatan');
    Route::get('/detailTugas/{id}', 'Admin\FetchDataController@detailTugas');
});

//Route add data (page admin)
Route::post('/tambahAdmin', 'Admin\AdminController@tambahAdmin');
Route::post('/tambahMurid', 'Admin\AddDataController@tambahMurid');
Route::post('/tambahGuru', 'Admin\AddDataController@tambahGuru');
Route::post('/tambahAgama', 'Admin\AddDataController@tambahAgama');
Route::post('/tambahGelar', 'Admin\AddDataController@tambahGelar');
Route::post('/tambahGender', 'Admin\AddDataController@tambahGender');
Route::post('/tambahJabatan', 'Admin\AddDataController@tambahJabatan');
Route::post('/tambahJurusan', 'Admin\AddDataController@tambahJurusan');
Route::post('/tambahMapel', 'Admin\AddDataController@tambahMapel');
Route::post('/tambahPengurusKelas', 'Admin\AddDataController@tambahPengurusKelas');
Route::post('/tambahTahunAjaran', 'Admin\AddDataController@tambahTahunAjaran');
Route::post('/tambahTingkatan', 'Admin\AddDataController@tambahTingkatan');
Route::post('/tambahTingkatPendidikan', 'Admin\AddDataController@tambahTingkatPendidikan');
Route::post('/tambahKelas', 'Admin\AddDataController@tambahKelas');
Route::post('/guru_kelas', 'Admin\AddDataController@guruKelas');

//page Delete data (page admin)
Route::post('/deleteDataAdmin/{id}', 'Admin\deleteDataController@deleteDataAdmin');
Route::post('/deleteDataMurid/{id}', 'Admin\deleteDataController@deleteDataMurid');
Route::post('/deleteDataGuru/{id}', 'Admin\deleteDataController@deleteDataGuru');
Route::post('/deleteDataAgama/{id}', 'Admin\deleteDataController@deleteDataAgama');
Route::post('/deleteDataGelar/{id}', 'Admin\deleteDataController@deleteDataGelar');
Route::post('/deleteDataGender/{id}', 'Admin\deleteDataController@deleteDataGender');
Route::post('/deleteDataJabatan/{id}', 'Admin\deleteDataController@deleteDataJabatan');
Route::post('/deleteDataJurusan/{id}', 'Admin\deleteDataController@deleteDataJurusan');
Route::post('/deleteDataMapel/{id}', 'Admin\deleteDataController@deleteDataMapel');
Route::post('/deleteDataPengurusKelas/{id}', 'Admin\deleteDataController@deleteDataPengurusKelas');
Route::post('/deleteDataTahunAjaran/{id}', 'Admin\deleteDataController@deleteDataTahunAjaran');
Route::post('/deleteDataTingkatan/{id}', 'Admin\deleteDataController@deleteDataTingkatan');
Route::post('/deleteDataTingkatPendidikan/{id}', 'Admin\deleteDataController@deleteDataTingkatPendidikan');
Route::post('/deleteDataKelas/{id}', 'Admin\deleteDataController@deleteDataKelas');





//Route authentikasi Guru (page guru)
Route::group(['prefix' => 'guru'], function () {
    Route::get('form-login', 'Guru\GuruController@formLogin');
    Route::post('login', 'Guru\GuruController@GuruLogin');
    Route::post('logout', 'Guru\GuruController@logout')->middleware('auth:guru-api');
    Route::group([
        //'middleware' => 'api',
        'prefix' => 'password'
    ], function () {
        Route::get('form-email', 'Guru\PasswordResetController@formEmail');
        Route::get('form-reset-passsword', 'Guru\PasswordResetController@formResetPassword');
        Route::post('create', 'Guru\PasswordResetController@create');
        Route::get('find/{token}', 'Guru\PasswordResetController@find');
        Route::post('reset', 'Guru\PasswordResetController@reset');
    });
    //Route fetch data (guru page)
    Route::get('dashboard','Guru\FetchDataController@dashboard')->name('guru.dashboard');
    Route::get('profil-guru', 'Guru\FetchDataController@profilGuru')->name('get.profil.guru');
    Route::get('kelas/{id}', 'Guru\AddDataController@kelas');
    Route::get('form-create-tugas', 'Guru\FetchDataController@formCreateTugas');
    Route::get('riwayat', 'Guru\FetchDataController@riwayat');
    route::get('update-tugas/{id}','Guru\FetchDataController@updateTugas')->name('get.update.tugas');
    Route::get('detail-tugas/{id}', 'Guru\FetchDataController@detailTugas');
    Route::get('list-kelas', 'Guru\FetchDataController@listKelas');
    Route::get('list-tugas', 'Guru\FetchDataController@listTugas');
    Route::get('open-tugas/{id}', 'Guru\FetchDataController@openTugas');
    Route::get('open-kelas/{id}', 'Guru\FetchDataController@openKelas');
    Route::get('list-tugas/{kelas_id}/{mapel_id}','Guru\FetchDataController@openTugasMapel');
    Route::get('notifications', 'Guru\FetchDataController@notifications');
    //Route::post('profilGuru', 'Guru\UpdateDataController@profilGuru');


    //Route post data (guru page)
    Route::post('tambah-tugas', 'Guru\AddDataController@tambahTugas');
    Route::post('update-tugas/{id}','Guru\UpdateDataController@updateTugas');
    Route::post('update-profile', 'Guru\UpdateDataController@updateProfile');
    Route::get('tugas-done/{id}', 'Guru\UpdateDataController@doneTugas');
    Route::get('delete-tugas/{id}', 'Guru\UpdateDataController@deleteTugas');
});









Route::group(['prefix' => 'murid'], function () {
    Route::get('form-login', 'Murid\MuridController@formLogin');
    Route::post('login', 'Murid\MuridController@MuridLogin');
    Route::post('logout', 'Murid\MuridController@logout')->middleware('auth:murid-api');
    Route::group([
        //'middleware' => 'api',
        'prefix' => 'password'
    ], function () {
        Route::get('form-email', 'Murid\PasswordResetController@formEmail');
        Route::post('create', 'Murid\PasswordResetController@create');
        Route::get('find/{token}', 'Murid\PasswordResetController@find');
        Route::post('reset', 'Murid\PasswordResetController@reset');
    });

        //Route fetch DETAIL (page murid)
    // Route::get()
    Route::get('profil-murid', 'Murid\FetchDataController@profilMurid')->name('get.profil.murid');
    Route::get('detail-tugas/{id}', 'Murid\FetchDataController@detailTugas');
    Route::get('tugas-saya', 'Murid\FetchDataController@tugasSaya');
});


