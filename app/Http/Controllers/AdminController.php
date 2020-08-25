<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Database\storeDbMasyarakatRequest;
use App\Http\Requests\Admin\Database\storeDbOpdRequest;

use App\Http\Requests\Admin\Opd\storeDataOpdRequest;
use App\Repositories\Admin\Opd\DataOpdRepository;

use App\Http\Requests\Admin\Prosedur\storeProsedurRequest;
use App\Repositories\Admin\Prosedur\ProsedurRepository;

use App\Repositories\Admin\DataSipeena\DataSipeenaRepository;

use App\Repositories\Admin\Database\DatabaseRepository;

use App\Http\Requests\Admin\Galeri\storeGaleriRequest;
use App\Repositories\Admin\Galeri\GaleriRepository;

use App\Repositories\Admin\User\UserRepository;

use App\prosedur;
use App\unitkerja;
use App\pendaftaran;
use App\lembaga;
use App\penaopd;
use App\dbopd;
use App\dbmasyarakat;
Use App\galeri;
Use App\user;

class AdminController extends Controller
{
    protected $dataSipeenaRepository;
    protected $dataOpdRepository;
    protected $prosedurRepository;
    protected $databaseRepository;
    protected $galeriRepository;
    protected $userRepository;

    public function __construct(
        DataSipeenaRepository $dataSipeenaRepository,
        DataOpdRepository $dataOpdRepository,
        ProsedurRepository $prosedurRepository,
        DatabaseRepository $databaseRepository,
        GaleriRepository $galeriRepository,
        UserRepository $userRepository
    )
    {
        $this->middleware('auth');
        $this->dataSipeenaRepository = $dataSipeenaRepository;
        $this->dataOpdRepository = $dataOpdRepository;
        $this->prosedurRepository = $prosedurRepository;
        $this->databaseRepository = $databaseRepository;
        $this->galeriRepository = $galeriRepository;
        $this->userRepository = $userRepository;
    }


    public function index()
    {   $inovasi = pendaftaran::where('kategori_peena','=', 'inovasi')->count();
        $penelitian = pendaftaran::where('kategori_peena','=','penelitian')->count();
        $penaopd = penaopd::count();
        return view ('admin.index',['inovasi' => $inovasi,'penelitian' => $penelitian, 'penaopd' => $penaopd]);
    }

    // ---------------- Data SiPeena ------------------------
    public function verifikasi()
    {   
        $perorangan = pendaftaran::where('kelompok','=', 0)
                                 ->where('verifikasi','=', 0)
                                 ->get();
        $kelompok = pendaftaran::where('kelompok','=',1)
                                ->where('verifikasi','=', 0)                       
                                ->get(); 
        $lembaga = lembaga::where('verifikasi', 0)->get();
        $pena_opd = penaopd::where('verifikasi', 0)->get();         
        return view ('admin.data-sipeena.verifikasi',compact('perorangan','kelompok','lembaga','pena_opd'));
    }
//-------------------- Verifikasi -------------------
    public function verifikasiPendaftaran($id)
    { 
        $pendaftaran = pendaftaran::find($id);
        return view ('admin.data-sipeena.verifikasi.verifikasi-pendaftaran',compact('pendaftaran'));
    }

    public function verifikasiLembaga($id)
    { 
        $lembaga = lembaga::find($id);
        return view ('admin.data-sipeena.verifikasi.verifikasi-lembaga',compact('lembaga'));
    }

    public function verifikasiOpd($id)
    { 
        $penaopd = penaopd::find($id);
        return view ('admin.data-sipeena.verifikasi.verifikasi-opd',compact('penaopd'));
    }
//--------------------- Update Verifikasi --------------
    public function updateVerifikasiPendaftaran(Request $request, $id)
    { 
        $pendaftaran = pendaftaran::find($id);
        $pendaftaran->verifikasi = $request->kdverif;
        $pendaftaran->ket = $request->komen;
        $pendaftaran->save();
        return redirect()->route('admin.verifikasi');
    }

    public function updateVerifikasiLembaga(Request $request, $id)
    { 
        $lembaga = lembaga::find($id);
        $lembaga->verifikasi = $request->kdverif;
        $lembaga->ket = $request->komen;
        $lembaga->save();
        return redirect()->route('admin.verifikasi');
    }

    public function updateVerifikasiOpd(Request $request, $id)
    { 
        $opd = penaopd::find($id);
        $opd->verifikasi = $request->kdverif;
        $opd->ket = $request->komen;
        $opd->save();
        return redirect()->route('admin.verifikasi');
    }
    //-------------------- ACC -------------------
    public function accPendaftaran($id)
    { 
        $pendaftaran = pendaftaran::find($id);
        return view ('admin.data-sipeena.verifikasi.acc-pendaftaran',compact('pendaftaran'));
    }

    public function accLembaga($id)
    { 
        $lembaga = lembaga::find($id);
        return view ('admin.data-sipeena.verifikasi.acc-lembaga',compact('lembaga'));
    }

    public function accOpd($id)
    { 
        $penaopd = penaopd::find($id);
        return view ('admin.data-sipeena.verifikasi.acc-opd',compact('penaopd'));
    }
//--------------------- Update ACC --------------
    public function updateAccPendaftaran(Request $request, $id)
    { 
        $pendaftaran = pendaftaran::find($id);
        $pendaftaran->verifikasi = $request->kdverif;
        $pendaftaran->ket = $request->komen;
        $pendaftaran->save();
        return redirect()->route('admin.verifikasi');
    }

    public function updateAccLembaga(Request $request, $id)
    { 
        $lembaga = lembaga::find($id);
        $lembaga->verifikasi = $request->kdverif;
        $lembaga->ket = $request->komen;
        $lembaga->save();
        return redirect()->route('admin.verifikasi');
    }

    public function updateAccOpd(Request $request, $id)
    { 
        $opd = penaopd::find($id);
        $opd->verifikasi = $request->kdverif;
        $opd->ket = $request->komen;
        $opd->save();
        return redirect()->route('admin.verifikasi');
    }
//-------------------- Finalis -------------------
    public function finalPendaftaran($id)
    { 
        $pendaftaran = pendaftaran::find($id);
        return view ('admin.data-sipeena.verifikasi.final-pendaftaran',compact('pendaftaran'));
    }

    public function finalLembaga($id)
    { 
        $lembaga = lembaga::find($id);
        return view ('admin.data-sipeena.verifikasi.final-lembaga',compact('lembaga'));
    }

    public function finalOpd($id)
    { 
        $penaopd = penaopd::find($id);
        return view ('admin.data-sipeena.verifikasi.final-opd',compact('penaopd'));
    }
//----------------------- Destroy -----------------------
    public function destroySipeenaPendaftaran($id)
    {
        $pendaftaran = $this->dataSipeenaRepository->destroySipeenaPendaftaran($id);
        return redirect()->route('admin.verifikasi');
    }

    public function destroySipeenaLembaga($id)
    {
        $lembaga = $this->dataSipeenaRepository->destroySipeenaLembaga($id);
        return redirect()->route('admin.verifikasi');
    }

    public function destroySipeenaOpd($id)
    {
        $opd = $this->dataSipeenaRepository->destroySipeenaOpd($id);
        return redirect()->route('admin.verifikasi');
    }

    public function diterima()
    {   
        $perorangan = pendaftaran::where('kelompok','=', 0)
                                 ->where('verifikasi','=', 1)
                                 ->get();
        $kelompok = pendaftaran::where('kelompok','=',1)
                                ->where('verifikasi','=', 1)                       
                                ->get(); 
        $lembaga = lembaga::where('verifikasi', 1)->get();
        $pena_opd = penaopd::where('verifikasi', 1)->get();         
        return view ('admin.data-sipeena.diterima',compact('perorangan','kelompok','lembaga','pena_opd'));
    }

    public function ditolak()
    {   
        $perorangan = pendaftaran::where('kelompok','=', 0)
                                 ->where('verifikasi','=', -1)
                                 ->get();
        $kelompok = pendaftaran::where('kelompok','=',1)
                                ->where('verifikasi','=', -1)                       
                                ->get(); 
        $lembaga = lembaga::where('verifikasi', -1)->get();
        $pena_opd = penaopd::where('verifikasi', -1)->get();         
        return view ('admin.data-sipeena.ditolak',compact('perorangan','kelompok','lembaga','pena_opd'));
    }

    public function finalis()
    {   
        $perorangan = pendaftaran::where('kelompok','=', 0)
                                 ->where('verifikasi','=', 2)
                                 ->get();
        $kelompok = pendaftaran::where('kelompok','=',1)
                                ->where('verifikasi','=', 2)                       
                                ->get(); 
        $lembaga = lembaga::where('verifikasi', 2)->get();
        $pena_opd = penaopd::where('verifikasi', 2)->get();         
        return view ('admin.data-sipeena.finalis',compact('perorangan','kelompok','lembaga','pena_opd'));
    }

    // ---------------- Prosedur ------------------------
    public function prosedur()
    {
        $prosedur = prosedur::all();
        return view ('admin.prosedur.index',compact('prosedur'));
    }

    public function storeProsedur(storeProsedurRequest $request)
    {
        $prosedur = $this->prosedurRepository->storeProsedur($request);
        return redirect()->route('admin.prosedur');
    }

    public function updateProsedur(storeProsedurRequest $request,$id)
    {
        $unitkerja = $this->prosedurRepository->updateProsedur($request,$id);
        return redirect()->route('admin.prosedur');
    }

    public function destroyProsedur($id)
    {
        $prosedur = $this->prosedurRepository->destroyProsedur($id);
        return redirect()->route('admin.prosedur');
    }

    // ---------------- OPD ------------------------
    public function opd()
    {
        $opd = unitkerja::all();
        return view ('admin.opd.index',compact('opd'));
    }

    public function storeOpd(storeDataOpdRequest $request)
    {
        $unitkerja = $this->dataOpdRepository->storeOpd($request);
        return redirect()->route('admin.opd');
    }

    public function updateOpd(storeDataOpdRequest $request,$id)
    {
        $unitkerja = $this->dataOpdRepository->updateOpd($request,$id);
        return redirect()->route('admin.opd');
    }

    public function destroyOpd($id)
    {
        $unitkerja = $this->dataOpdRepository->destroyOpd($id);
        return redirect()->route('admin.opd');
    }

    // ---------------- Database ------------------------
    public function database()
    {
        $dbopd = dbopd::all();
        $dbmasyarakat = dbmasyarakat::all();
        return view ('admin.database.index',compact('dbopd','dbmasyarakat'));
    }

      // ---------------- Database OPD ------------------------
    public function storeDbOpd(storeDbOpdRequest $request)
    {
        $dbopd = $this->databaseRepository->storeDbOpd($request);
        return redirect()->route('admin.database');
    }

    public function updateDbOpd(storeDbOpdRequest $request,$id)
    {
        $dbopd = $this->databaseRepository->updateDbOpd($request);
        return redirect()->route('admin.database');
    }

    public function destroyDbOpd($id)
    {
        $dbopd = $this->databaseRepository->destroyDbOpd($id);
        return redirect()->route('admin.database');
    }

      // ---------------- Database Masyarakat Inovasi ------------------------
    public function storeDbMasyarakat(storeDbMasyarakatRequest $request)
    {
        $dbopd = $this->databaseRepository->storeDbMasyarakat($request);
        return redirect()->route('admin.database');
    }

    public function updateDbMasyarakat(storeDbMasyarakatRequest $request,$id)
    {
        $dbopd = $this->databaseRepository->updateDbMasyarakat($request);
        return redirect()->route('admin.database');
    }

    public function destroyDbMasyarakat($id)
    {
        $dbopd = $this->databaseRepository->destroyDbMasyarakat($id);
        return redirect()->route('admin.database');
    }
    // ---------------- Galeri ------------------------
    public function galeri()
    {
        $galeri =  galeri::all();
        return view ('admin.galeri.index',compact('galeri'));
    }

    public function storeGaleri(storeGaleriRequest $request)
    {
        $galeri = $this->galeriRepository->storeGaleri($request);
        return redirect()->route('admin.galeri');
    }

    public function UpdateGaleri(storeGaleriRequest $request, $id)
    {
        $galeri = $this->galeriRepository->updateGaleri($request);
        return redirect()->route('admin.galeri');
    }

    public function destroyGaleri(storeGaleriRequest $request)
    {
        $galeri = $this->galeriRepository->destroyGaleri($request);
        return redirect()->route('admin.galeri');
    }
    // ---------------- Activated User ------------------------
    public function user()
    {
        $user =  user::where('level', '=', 2)->get();
        return view ('admin.user.index',compact('user'));
    }

     public function activatedUser(request $request,$id)
    {
        $user = $this->userRepository->activatedUser($request,$id);
        return redirect()->route('admin.user');
    }

}
