<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ModelAdmin;
use App\Models\modelJob;
use App\Models\User;
use App\Models\ModelTamu;
use App\Models\ModelApply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ControllerJob extends Controller
{
    public function index(){
        $listJob = DB::table('job')->get();
        return view('landingPage.index', compact('listJob'));
    }

    public function logUser($id)
    {
        $user = Auth::user();
        if ($user->id === $id) {
            $listJob = DB::table('job')->get();
            return redirect('/home', compact('listJob'));
        } else {
            // Jika user tidak memiliki izin, redirect ke halaman tertentu atau tampilkan pesan error
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }


    public function listJob(){
        $sumOfjob = DB::table('job')->count();
        $listJob = DB::table('job')->get();
        return view('landingPage.job', compact('listJob', 'sumOfjob'));
    }

    public function search(Request $request)
{
    $job = $request->input('job');

    $listJob = modelJob::where('job', 'like', "%$job%")
               ->get();

    return view('landingPage.index', compact('listJob'));
}

    public function detailJob($id)
    {
        // Mengambil User Id berdasarkan user yang telah login
        $user = Auth::user();

        // Pengecekan apakah user sudah login
        if ($user) {
            $userId = $user->id;
            // Mengambil detail job berdasarkan id
            $jobDetail = modelJob::where('id', $id)->first();
            if (!$jobDetail) {
                abort(404);
            }

            $hardSkills = explode(',', $jobDetail->hard_skill);
            $softSkills = explode('-', $jobDetail->soft_skill);

            // Mengirim data ke halaman
            return view('landingPage.detailJob', compact('userId', 'jobDetail', 'hardSkills', 'softSkills'));
        } else {
            // Tindakan jika user belum login
            return redirect('/login')->with(['loginFirst' => 'Anda harus login untuk mengakses halaman ini.']);
        }
    }


    public function addUser(Request $request)
    {
        // Validasi inputan user
        $validator = Validator::make($request->all(), [
            'field_name' => 'required',
            'field_email' => 'required|email',
            'field_password' => 'required',
        ], [
            'field_name.required' => 'Kolom Nama Lengkap Wajib diisi.',
            'field_email.required' => 'Email Tidak Valid.',
            'field_password.required' => 'Kolom Password Wajib diisi.',
        ]);

        if ($validator->fails()) {
            return redirect('/sign-up')
                ->withErrors($validator)
                ->withInput();
        }

        // Proses Inputan User disimpan dalam Tabel User
        $addUser = new User;
        $addUser->name = $request->input('field_name');
        $addUser->email = $request->input('field_email');
        $addUser->password = $request->input('field_password');
        $addUser->save();
        return redirect('/login')->with('Accepted', 'Berhasil Registarasi Akun, Silahkan Login.');

    }

    public function EditProfil($id, Request $request)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('field_name');
        $user->nik = $request->input('field_nik');
        $user->alamat = $request->input('field_alamat');
        $user->no_hp = $request->input('field_hp');
        $user->tgl_lahir = $request->input('field_tglLahir');
        $user->gender = $request->input('field_gender');

        // Buat direktori untuk menyimpan file jika belum ada
        $cvDirectory = 'public/uploads/Berkas-CV';
        $ijazahDirectory = 'public/uploads/Berkas-Ijazah';
        $sehatDirectory = 'public/uploads/Berkas-Sehat';

        if ($request->hasFile('field_cv')) {
            $cv = $request->file('field_cv')->store($cvDirectory);
            $user->cv = $cv;
        }

        if ($request->hasFile('field_ijazah')) {
            $ijazah = $request->file('field_ijazah')->store($ijazahDirectory);
            $user->ijazah = $ijazah;
        }

        if ($request->hasFile('field_sehat')) {
            $sehat = $request->file('field_sehat')->store($sehatDirectory);
            $user->sehat = $sehat;
        }

        $user->save();

        return redirect('/profil/{id}')->with('updateBerhasil', true);
    }

    public function showProfil($id)
    {
        $user = Auth::user();

        return view('landingPage.profil', compact('user'));
    }


    public function applyJobUser($id, Request $request)
{
    // Mengambil User Id berdasarkan user yang telah login
    $user = Auth::user();
    $userId = $user->id;

    // $updateBerhasil = false;
    // $updateGagal = false;


    // Pengecekan apakah user sudah login
    if ($user) {
        $apply = new ModelApply;
        $apply->id_job = $request->input('field_idJob');
        $apply->id_user = $user->id; // Menggunakan id user yang telah login



        // Mengambil detail job berdasarkan id
        $jobDetail = modelJob::where('id', $id)->first();
        if (!$jobDetail) {
            abort(404);
        }

        $hardSkills = explode(',', $jobDetail->hard_skill);
        $softSkills = explode('-', $jobDetail->soft_skill);
        $updateBerhasil =  $user && ($user->cv != NULL || $user->ijazah != NULL);;
        $updateGagal = $user && ($user->cv == NULL || $user->ijazah == NULL);

        if ($updateGagal) {
            $viewData = [
                'userId' => $user->id,
                'jobDetail' => $jobDetail,
                'hardSkills' => $hardSkills,
                'softSkills' => $softSkills,
                'updateGagal' => $updateGagal,
            ];

            // Render the view with the success modal
            return view('landingPage.detailJob', $viewData);
        } elseif ($updateBerhasil) {
            $viewData = [
                'userId' => $user->id,
                'jobDetail' => $jobDetail,
                'hardSkills' => $hardSkills,
                'softSkills' => $softSkills,
                'updateBerhasil' => $updateBerhasil,
            ];

            $apply->save();
            // Render the view with the failure modal
            return view('landingPage.detailJob', $viewData);
        };

            // Render the view without showing any modal
            return view('landingPage.detailJob', $viewData);



    } else {
        // Tindakan jika user belum login
        return redirect('/login')->with(['warning' => 'Anda harus login untuk mengakses halaman ini.']);
    }
}


    public function checkLoginStatus()
    {
        $loggedIn = auth()->check();

        return response()->json(['loggedIn' => $loggedIn]);
    }




}
