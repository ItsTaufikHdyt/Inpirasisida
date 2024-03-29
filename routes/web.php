<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('prosedur/more/{id}', 'HomeController@showMore')->name('home.showMore');
Route::get('prosedur/download/{id}', 'HomeController@downloadProsedur')->name('home.downloadProsedur');
Route::get('panduan', 'HomeController@panduan')->name('home.panduan');
Route::get('downloadDbOpd/{id}', 'HomeController@downloadDbOpd')->name('home.downloadDbOpd');
Route::get('downloadDbMasyarakat/{id}', 'HomeController@downloadDbMasyarakat')->name('home.downloadDbMasyarakat');


//------------------------ Database Masyarakat --------------------------
Route::get('dbmasyarakatinovasi', 'HomeController@dbMasyarakatInovasi')->name('home.dbMasyarakatInovasi');
Route::get('getdbmasyarakatinovasi', 'HomeController@getDbMasyarakatInovasi')->name('home.getDbMasyarakatInovasi');
Route::get('showdbmasyarakatinovasi/{id}', 'HomeController@showDbMasyarakatInovasi')->name('home.showDbMasyarakatInovasi');
Route::get('dbmasyarakatpenelitian', 'HomeController@dbMasyarakatPenelitian')->name('home.dbMasyarakatPenelitian');
Route::get('getdbmasyarakatpenelitian', 'HomeController@getDbMasyarakatPenelitian')->name('home.getDbMasyarakatPenelitian');
Route::get('showdbmasyarakatpenelitian/{id}', 'HomeController@showDbMasyarakatPenelitian')->name('home.showDbMasyarakatPenelitian');
//------------------------ Database OPD --------------------------
Route::get('dbopdinovasi', 'HomeController@dbOpdInovasi')->name('home.dbOpdInovasi');
Route::get('getdbopdinovasi', 'HomeController@getDbOpdInovasi')->name('home.getDbOpdInovasi');
Route::get('showdbopdinovasi/{id}', 'HomeController@showDbOpdInovasi')->name('home.showDbOpdInovasi');
Route::get('dbopdpenelitian', 'HomeController@dbOpdPenelitian')->name('home.dbOpdPenelitian');
Route::get('getdbopdpenelitian', 'HomeController@getDbOpdPenelitian')->name('home.getDbOpdPenelitian');
Route::get('showdbopdpenelitian/{id}', 'HomeController@showDbOpdPenelitian')->name('home.showDbOpdPenelitian');
//--------------- Verify -------------------
Route::get('/user-register', 'Auth\RegisterController@ShowRegisterForm')->name('userRegister');
Route::post('/user-register', 'Auth\RegisterController@HandleRegister')->name('prosesRegister');
Route::get('/user-login', 'Auth\LoginController@ShowLoginForm')->name('userLogin');
Route::post('/user-login', 'Auth\LoginController@HandleLogin')->name('prosesLogin');
Route::get('/verify/{token}', 'Auth\VerifyController@VerifyEmail')->name('verify');
//--------------- Captcha-------------------
Route::get('login/refreshcaptcha', 'Auth\LoginController@refreshCaptcha');
Route::get('register/refreshcaptcha', 'Auth\RegisterController@refreshCaptcha');

//--------------- Admin -------------------
Route::group(['middleware' => 'cekstatus', "prefix" => "admin/"], function () {
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
    //---------------- Download Data Pendaftaran-------------------
    Route::get('downloadKtpPendaftaran/{id}', 'AdminController@downloadKtpPendaftaran')->name('admin.downloadKtpPendaftaran');
    Route::get('downloadSuratPernyataanPendaftaran/{id}', 'AdminController@downloadSuratPernyataanPendaftaran')->name('admin.downloadSuratPernyataanPendaftaran');
    Route::get('downloadIzinOrtuPendaftaran/{id}', 'AdminController@downloadIzinOrtuPendaftaran')->name('admin.downloadIzinOrtuPendaftaran');
    Route::get('downloadIzinSekolahPendaftaran/{id}', 'AdminController@downloadIzinSekolahPendaftaran')->name('admin.downloadIzinSekolahPendaftaran');
    Route::get('downloadProposalPendaftaran/{id}', 'AdminController@downloadProposalPendaftaran')->name('admin.downloadProposalPendaftaran');
    //--------------- Data SiPeena ---------------------
    Route::get('verifikasi', 'AdminController@verifikasi')->name('admin.verifikasi');
    Route::get('get-verifikasi-individu', 'AdminController@getVerifikasiIndividu')->name('admin.getVerifikasiIndividu');
    Route::get('get-verifikasi-kelompok', 'AdminController@getVerifikasiKelompok')->name('admin.getVerifikasiKelompok');
    Route::get('get-verifikasi-lembaga', 'AdminController@getVerifikasiLembaga')->name('admin.getVerifikasiLembaga');
    Route::get('get-verifikasi-opd', 'AdminController@getVerifikasiOpd')->name('admin.getVerifikasiOpd');

    Route::get('diterima', 'AdminController@diterima')->name('admin.diterima');
    Route::get('get-diterima-individu', 'AdminController@getDiterimaIndividu')->name('admin.getDiterimaIndividu');
    Route::get('get-diterima-kelompok', 'AdminController@getDiterimaKelompok')->name('admin.getDiterimaKelompok');
    Route::get('get-diterima-lembaga', 'AdminController@getDiterimaLembaga')->name('admin.getDiterimaLembaga');
    Route::get('get-diterima-opd', 'AdminController@getDiterimaOpd')->name('admin.getDiterimaOpd');

    Route::get('ditolak', 'AdminController@ditolak')->name('admin.ditolak');
    Route::get('get-ditolak-individu', 'AdminController@getDitolakIndividu')->name('admin.getDitolakIndividu');
    Route::get('get-ditolak-kelompok', 'AdminController@getDitolakKelompok')->name('admin.getDitolakKelompok');
    Route::get('get-ditolak-lembaga', 'AdminController@getDitolakLembaga')->name('admin.getDitolakLembaga');
    Route::get('get-ditolak-opd', 'AdminController@getDitolakOpd')->name('admin.getDitolakOpd');

    Route::get('finalis', 'AdminController@finalis')->name('admin.finalis');
    Route::get('get-finalis-individu', 'AdminController@getFinalisIndividu')->name('admin.getFinalisIndividu');
    Route::get('get-finalis-kelompok', 'AdminController@getFinalisKelompok')->name('admin.getFinalisKelompok');
    Route::get('get-finalis-lembaga', 'AdminController@getFinalisLembaga')->name('admin.getFinalisLembaga');
    Route::get('get-finalis-opd', 'AdminController@getFinalisOpd')->name('admin.getFinalisOpd');
    //--------------- Display Proposal ---------------------
    Route::get('displayproposal-pendaftaran/{id}', 'AdminController@displayProposalPendaftaran')->name('admin.display.proposal-pendaftaran');
    Route::get('displayproposal-lembaga/{id}', 'AdminController@displayProposalLembaga')->name('admin.display.proposal-lembaga');
    Route::get('displayproposal-opd/{id}', 'AdminController@displayProposalOPD')->name('admin.display.proposal-penaopd');
    Route::get('displaySuratPernyataan-opd/{id}', 'AdminController@displaySuratPernyataanOPD')->name('admin.display.surat-pernyataan-penaopd');
    //--------------- Verifikasi -----------------------
    Route::get('verifikasi-pendaftaran/{id}', 'AdminController@verifikasiPendaftaran')->name('admin.verifikasiPendaftaran');
    Route::get('verifikasi-opd/{id}', 'AdminController@verifikasiOpd')->name('admin.verifikasiOpd');
    Route::get('verifikasi-lembaga/{id}', 'AdminController@verifikasiLembaga')->name('admin.verifikasiLembaga');

    Route::put('update-verifikasi-pendaftaran/{id}', 'AdminController@updateVerifikasiPendaftaran')->name('admin.updateVerifikasiPendaftaran');
    Route::put('update-verifikasi-opd/{id}', 'AdminController@updateVerifikasiOpd')->name('admin.updateVerifikasiOpd');
    Route::put('update-verifikasi-lembaga/{id}', 'AdminController@updateVerifikasiLembaga')->name('admin.updateVerifikasiLembaga');

    //----------------------------- ACC --------------------
    Route::get('acc-pendaftaran/{id}', 'AdminController@accPendaftaran')->name('admin.AccPendaftaran');
    Route::get('acc-opd/{id}', 'AdminController@accOpd')->name('admin.AccOpd');
    Route::get('acc-lembaga/{id}', 'AdminController@accLembaga')->name('admin.AccLembaga');

    Route::put('update-acc-pendaftaran/{id}', 'AdminController@updateAccPendaftaran')->name('admin.updateAccPendaftaran');
    Route::put('update-acc-opd/{id}', 'AdminController@updateAccOpd')->name('admin.updateAccOpd');
    Route::put('update-acc-lembaga/{id}', 'AdminController@updateAccLembaga')->name('admin.updateAccLembaga');

    Route::delete('delete-data-sipeena-pendaftaran/{id}', 'AdminController@destroySipeenaPendaftaran')->name('admin.destroySipeenaPendaftaran');
    Route::delete('delete-data-sipeena-lembaga/{id}', 'AdminController@destroySipeenaLembaga')->name('admin.destroySipeenaLembaga');
    Route::delete('delete-data-sipeena-opd/{id}', 'AdminController@destroySipeenaOpd')->name('admin.destroySipeenaOpd');
    //----------------------------- Finalis --------------------
    Route::get('final-pendaftaran/{id}', 'AdminController@finalPendaftaran')->name('admin.FinalPendaftaran');
    Route::get('final-opd/{id}', 'AdminController@finalOpd')->name('admin.FinalOpd');
    Route::get('final-lembaga/{id}', 'AdminController@finalLembaga')->name('admin.FinalLembaga');

    //--------------- Prosedur ---------------------
    Route::get('prosedur', 'AdminController@prosedur')->name('admin.prosedur');
    Route::get('get-prosedur', 'AdminController@getProsedur')->name('admin.getProsedur');
    Route::post('storeProsedur', 'AdminController@storeProsedur')->name('admin.storeProsedur');
    Route::get('edit-prosedur/{id}', 'AdminController@editProsedur')->name('admin.editProsedur');
    Route::put('update-prosedur/{id}', 'AdminController@updateProsedur')->name('admin.updateProsedur');
    Route::delete('delete-prosedur/{id}', 'AdminController@destroyProsedur')->name('admin.destroyProsedur');

    //--------------- OPD ---------------------
    Route::get('data-opd', 'AdminController@opd')->name('admin.opd');
    Route::get('get-data-opd', 'AdminController@getOpd')->name('admin.getOpd');
    Route::get('edit-data-opd/{id}', 'AdminController@editOpd')->name('admin.editOpd');
    Route::post('store-data-opd', 'AdminController@storeOpd')->name('admin.storeOpd');
    Route::put('update-data-opd/{id}', 'AdminController@updateOpd')->name('admin.updateOpd');
    Route::delete('delete-data-opd/{id}', 'AdminController@destroyOpd')->name('admin.destroyOpd');
    //--------------- Database ---------------------
    Route::get('database', 'AdminController@database')->name('admin.database');
    //---------------- Database Inovasi Perangkat Daerah -------------
    Route::get('get-database-dbopd', 'AdminController@getDatabaseOpd')->name('admin.databaseOpd');
    Route::post('store-dbopd', 'AdminController@storeDbOpd')->name('admin.storeDbOpd');
    Route::get('edit-dbopd/{id}', 'AdminController@editDbOpd')->name('admin.editDbOpd');
    Route::put('update-dbopd/{id}', 'AdminController@updateDbOpd')->name('admin.updateDbOpd');
    Route::delete('delete-dbopd/{id}', 'AdminController@destroyDbOpd')->name('admin.deleteDbOpd');
    Route::get('download-dbopd/{id}', 'AdminController@downloadDbOpd')->name('admin.downloadDbOpd');
    //---------------- Database Inovasi Masyarakat -------------
    Route::get('get-database-dbmasyarakat', 'AdminController@getDatabaseMasyarakat')->name('admin.databaseMasyarakat');
    Route::post('store-dbmasyarakat', 'AdminController@storeDbMasyarakat')->name('admin.storeDbMasyarakat');
    Route::get('edit-dbmasyarakat/{id}', 'AdminController@editDbMasyarakat')->name('admin.editDbMasyarakat');
    Route::put('update-dbmasyarakat/{id}', 'AdminController@updateDbMasyarakat')->name('admin.updateDbMasyarakat');
    Route::delete('delete-dbmasyarakat/{id}', 'AdminController@destroyDbMasyarakat')->name('admin.deleteDbMasyarakat');
    Route::get('download-dbmasyarakat/{id}', 'AdminController@downloadDbMasyarakat')->name('admin.downloadDbMasyarakat');
    //---------------- Galeri-------------
    Route::get('galeri', 'AdminController@galeri')->name('admin.galeri');
    Route::get('get-galeri', 'AdminController@getGaleri')->name('admin.getGaleri');
    Route::post('store-galeri', 'AdminController@storeGaleri')->name('admin.storeGaleri');
    Route::delete('delete-galeri/{id}', 'AdminController@destroyGaleri')->name('admin.destroyGaleri');
    //---------------- Activation User -------------
    Route::get('activateduser', 'AdminController@user')->name('admin.user');
    Route::get('get-user', 'AdminController@getUser')->name('admin.getuser');
    Route::get('edit-user/{id}', 'AdminController@editUser')->name('admin.edituser');
    Route::put('activated/{id}', 'AdminController@activatedUser')->name('admin.activated');
    Route::delete('delete-user/{id}', 'AdminController@destroyUser')->name('admin.destroyUser');
});

//--------------- Sipena -------------------
Route::group(["prefix" => "sipeena/"], function () {
    Route::get('/', 'SipeenaController@index')->name('sipeena');
    //--------------- Invovasi -------------------
    Route::get('/inovasi', 'SipeenaController@inovasi')->name('inovasi');;
    Route::get('/inovasi/form-ind-inovasi', 'SipeenaController@formIndInovasi')->name('formIndInovasi');
    Route::post('store-form-ind-inovasi', 'SipeenaController@storeFormIndInovasi')->name('storeFormIndInovasi');
    Route::get('/inovasi/form-klp-inovasi', 'SipeenaController@formKlpInovasi')->name('formKlpInovasi');
    Route::post('store-form-klp-inovasi', 'SipeenaController@storeFormKlpInovasi')->name('storeFormKlpInovasi');
    Route::get('/inovasi/form-lmb-inovasi', 'SipeenaController@formLmbInovasi')->name('formLmbInovasi');
    Route::post('store-form-lmb-inovasi', 'SipeenaController@storeFormLmbInovasi')->name('storeFormLmbInovasi');
    //--------------- Invovasi -------------------

    //--------------- Penelitian -------------------
    Route::get('/penelitian', 'SipeenaController@penelitian')->name('penelitian');
    Route::get('/penelitian/form-ind-research', 'SipeenaController@formIndPenelitian')->name('formIndPenelitian');
    Route::post('store-form-ind-research', 'SipeenaController@storeFormIndPenelitian')->name('storeFormIndPenelitian');
    Route::get('/penelitian/form-klp-research', 'SipeenaController@formKlpPenelitian')->name('formKlpPenelitian');
    Route::post('store-form-klp-research', 'SipeenaController@storeFormKlpPenelitian')->name('storeFormKlpPenelitian');
    Route::get('/penelitian/form-lmb-research', 'SipeenaController@formLmbPenelitian')->name('formLmbPenelitian');
    Route::post('store-form-lmb-research', 'SipeenaController@storeFormLmbPenelitian')->name('storeFormLmbPenelitian');
    //--------------- Penelitian -------------------

    //--------------- OPD-------------------
    Route::get('/opd', 'SipeenaController@opd')->name('opd');
    Route::post('store-opd', 'SipeenaController@storeOpd')->name('storeOpd');

    //--------------- OPD -------------------

    //--------------- Display-proposal -------------------
    Route::get('displayproposal-pendaftaran/{id}', 'SipeenaController@displayProposalPendaftaran')->name('sipeena.display.proposal-pendaftaran');
    Route::get('displayproposal-lembaga/{id}', 'SipeenaController@displayProposalLembaga')->name('sipeena.display.proposal-lembaga');
    Route::get('displayproposal-opd/{id}', 'SipeenaController@displayProposalOPD')->name('sipeena.display.proposal-penaopd');

    //--------------- Captcha-------------------
    Route::get('/refreshcaptcha', 'SipeenaController@refreshCaptcha');
    //--------------- Captcha -------------------

    //--------------- Riwayat -------------------
    Route::get('/riwayat', 'SipeenaController@riwayat')->name('riwayat');
    Route::get('/getPendaftaranInovasi', 'SipeenaController@getPendaftaranInovasi')->name('riwayat.getPendaftaranInovasi');
    Route::get('/showPendaftaranInovasi/{id}', 'SipeenaController@showPendaftaranInovasi')->name('riwayat.showPendaftaranInovasi');
    Route::get('/getPendaftaranPenelitian', 'SipeenaController@getPendaftaranPenelitian')->name('riwayat.getPendaftaranPenelitian');
    Route::get('/showPendaftaranPenelitian/{id}', 'SipeenaController@showPendaftaranPenelitian')->name('riwayat.showPendaftaranPenelitian');
    Route::get('/getLembaga', 'SipeenaController@getLembaga')->name('riwayat.getLembaga');
    Route::get('/showLembaga/{id}', 'SipeenaController@showLembaga')->name('riwayat.showLembaga');
    Route::get('/getOpd', 'SipeenaController@getOpd')->name('riwayat.getOpd');
    Route::get('/showOpd/{id}', 'SipeenaController@showOpd')->name('riwayat.showOpd');
    //--------------- Riwayat -------------------

    //--------------- Profil -------------------
    Route::get('/profil', 'SipeenaController@profil')->name('profil');
    Route::put('/updateProfil/{id}', 'SipeenaController@updateProfil')->name('profil.update');
    //--------------- Profil -------------------
});

Route::get('/home', 'HomeController@index')->name('home');

//------------------ Clear ------------
Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');

    return "Cleared!";
});

//------------------ Storage Link ------------
Route::get('/storagelink', function () {
    Artisan::call('storage:link');

    return "Success Storage Link!";
});

//------------------ Key Generate ------------
Route::get('/keygenerate', function () {
    Artisan::call('key:generate');

    return "Success Generate!";
});
