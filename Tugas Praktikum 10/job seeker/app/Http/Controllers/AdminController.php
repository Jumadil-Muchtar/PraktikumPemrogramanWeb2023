<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\modelJob;
use App\Models\ModelApply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use App\Mail\Interview;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function dashboard()
    {
        $applyCount = ModelApply::count();

        $jobCount = modelJob::count();

        $userCount = User::count();

        $usersWithBerkas = User::whereNotNull('cv')
            ->whereNotNull('ijazah')
            ->whereNotNull('sehat')
            ->get();

        $usersCountWithBerkas = $usersWithBerkas->count();

        if (Auth::guard('admin')->check()) {
            return view('adminPage.dashboard', compact('applyCount', 'jobCount', 'userCount', 'usersCountWithBerkas'));
        }

        return view ('adminPage.dashboard');
    }

    public function dataJob()
    {
        $dataJob = DB::table('job')->get();
        return view('adminPage.dataJob', compact('dataJob'));
    }

    public function addJob (Request $request){
        // Validasi data yang diunggah oleh user
        $validator = Validator::make($request->all(), [
            'field_logo' => 'required',
            'field_job' => 'required',
            'field_email' => 'required|email',
            'field_gaji' => 'required',
            'field_kontak' => 'required',
            'field_company' => 'required',
            'field_tersedia' => 'required',
            'field_lokasi' => 'required',
            'field_hard' => 'required',
            'field_soft' => 'required',
            'field_kategori' => 'required',
            'field_descJob' => 'required',
            'field_descCompany' => 'required',
        ], [
            'field_logo.required' => 'Kolom Logo Perusahaan Wajib diisi.',
            'field_job.required' => 'Kolom Pekerjaan wajib diisi.',
            'field_company.required' => 'Kolom Nama Perusahaan wajib diisi.',
            'field_tersedia.required' => 'Kolom tersedia wajib diisi',
            'field_email.email' => 'Format Email tidak valid.',
            'field_kontak.required' => 'Kolom Kontak Perusahaan wajib diisi.',
            'field_gaji.required' => 'Kolom Gaji wajib diisi.',
            'field_lokasi.required' => 'Kolom Lokasi Pekerjaan wajib diisi.',
            'field_hard.required' => 'Kolom Requitment Hard Skill wajib diisi.',
            'field_soft.required' => 'Kolom Requitment Sost Skill wajib diisi.',
            'field_kategori.required' => 'Kolom Kategori wajib diisi.',
            'field_descJob.required' => 'Kolom Deskripsi Pekerjaan wajib diisi.',
            'field_descCompany.required' => 'Kolom Deskripsi Perusahaan wajib diisi.',

        ]);

        if ($validator->fails()) {
            return redirect('/adminJob')
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan Logo Perusahaan
        $logoFileName = $request->file('field_logo')->getClientOriginalName();

        $addJob = new modelJob;
        $addJob->job = $request->input('field_job');
        $addJob->desc_job = $request->input('field_descJob');
        $addJob->kategori = $request->input('field_kategori');
        $addJob->gaji = $request->input('field_gaji');
        $addJob->email_company = $request->input('field_email');
        $addJob->kontak_company = $request->input('field_kontak');
        $addJob->company = $request->input('field_company');
        $addJob->tersedia  = $request->input('field_tersedia');
        $addJob->soft_skill = $request->input('field_soft');
        $addJob->hard_skill = $request->input('field_hard');
        $addJob->desc_company = $request->input('field_descCompany');
        $addJob->lokasi = $request->input('field_lokasi');
         // Simpan nama file ke database
         $addJob->logo_company = $logoFileName;
        // Pindahkan file ke direktori penyimpanan
        $request->file('field_logo')->move(public_path('landingPage/assets/img/icon'), $logoFileName);

        $addJob->save();
        return redirect('/adminJob')->with('success', 'Data Lowongan Pekerjaan berhasil Ditambahkan.');
    }


    public function deleteJob($id)
    {
        $job = modelJob::where('id', $id)->first(); //satu baris pertama dari id 

        if (!$job) {
            return redirect('/adminJob')->with('error', 'Pekerjaan tidak ditemukan');
        }

        $job->delete();

        return redirect('/adminJob')->with('delete', 'Data Pekerjaan berhasil dihapus');
    }


    public function editJob(Request $request, $id)
    {
        $job = modelJob::where('id', $id)->first();

        if (!$job) {
            return redirect('/adminJob')->with('error', 'Data Pekerjaan tidak ditemukan');
        }

        // Validasi data yang diinput oleh pengguna
        $cek = Validator::make($request->all(), [
            'field_jobEdit' => 'required',
            'field_descJobEdit' => 'required',
            'field_companyEdit' => 'required',
            'field_emailEdit' => 'required|email',
            'field_kontakEdit' => 'required',
            'field_lokasiEdit' => 'required',
            'field_tersediaEdit' => 'required',
            
        ]);

        if ($cek->fails()) {
            return redirect('/adminJob')
                ->with('salah', 'Gagal mengedit data. Pastikan Anda mengisi semua field yang ada.');
        }

        // Simpan perubahan data
        $job->job = $request->input('field_jobEdit');
        $job->desc_job = $request->input('field_descJobEdit');
        $job->company = $request->input('field_companyEdit');
        $job->email_company = $request->input('field_emailEdit');
        $job->kontak_company = $request->input('field_kontakEdit');
        $job->lokasi = $request->input('field_lokasiEdit');
        $job->tersedia = $request->input('field_tersediaEdit');
        
        $save = $job->update();

        if ($save) {
            return redirect('/adminJob')->with('edit', 'Data Pekerjaan berhasil diedit.');
        }

        return redirect('/adminJob')->with('salah', 'Gagal mengedit data. Pastikan Anda mengisi semua field yang ada.');


    }

    public function infoInterview($id, Request $request)
    {
        $interview = ModelApply::find($id); //id dri apply

        if (!$interview) {
            return redirect('/apply')->with('gagal', 'Data Interview tidak ditemukan!');
        }

        // Update nilai tgl_interview dan jam_interview
        $interview->tgl_interview = $request->input('field_tgl');
        $interview->jam_interview = $request->input('field_waktu');

        // Simpan perubahan ke database
        $interview->save();

        // Kirim email
        $mailPelamar = $request->input('field_email');
        try {
            Mail::to($mailPelamar)->send(new Interview($interview));
        } catch (\Swift_TransportException $e) {
            // Terjadi kesalahan pengiriman email
            return redirect('/apply')->with('gagal', 'Email Interview Gagal Dikirim!');
        }

        return redirect('/apply')->with('berhasil', 'Email Interview Berhasil Dikirim!');
    }

    public function applyJob()
    {
        $applicants = ModelApply::with(['user', 'job'])->get();


        return view('adminPage.karyawan', compact('applicants'));
    }


    public function downloadBerkas($id)
    {
        // Mengambil data sebagai satu baris data
        $dataDokumen = DB::table('users')->where('id', $id)->first();

        if (!$dataDokumen) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        // Eksport dari lokasi penyimpanan berkas
        $cvPath = storage_path('app/' . $dataDokumen->cv);
        $ijazahPath = storage_path('app/' . $dataDokumen->ijazah);
        $sehatPath = storage_path('app/' . $dataDokumen->sehat);

        // Membuat file zip
        $zip = new \ZipArchive();
        $zipFileName = $dataDokumen->name . '_berkas.zip';

        if ($zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)) {
            $this->addFileToZip($cvPath, $zip, 'CV.pdf');
            $this->addFileToZip($ijazahPath, $zip, 'Ijazah.pdf');
            $this->addFileToZip($sehatPath, $zip, 'Surat_Kesehatan.pdf');
            $zip->close();

            return response()->download($zipFileName)->deleteFileAfterSend(true);
        }

        return redirect()->back()->with('error', 'Failed to create zip file.');
    }

    private function addFileToZip($filePath, $zip, $zipFileName)
    {
        if (file_exists($filePath)) {
            $zip->addFile($filePath, $zipFileName);
        }
    }

}
