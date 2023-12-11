<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Patients;
use App\Models\Appointment;
use App\Models\Appointments;
use Illuminate\Http\Request;
use App\Models\MedicalRecords;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    // Appointment
    public function appointmentview(){
        $appointments = Appointments::paginate(3);

        return view('dokter.appointment', compact('appointments'));
    }

    public function createappointment(){
        // Mengambil daftar pasien untuk formulir
        $patients = Patients::all();

        return view('dokter.add-appointment', ['patients' => $patients]);
    }

    public function uploadAppointment(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'patient_complaints' => 'required|string',
            'status' => 'required|in:menunggu,sedang konsultasi,selesai,ditolak',
            'queue_number' => 'nullable|string',
            'appointment_date' => 'required|date',
        ], [
            'patient_id.exists' => 'The selected patient is invalid.',
            'status.in' => 'The selected status is invalid.',
            // Add more custom messages as needed
        ]);

        // Mengambil ID dokter yang sedang login
        $doctorId = Auth::id();

        // Membuat janji temu dengan menyertakan ID dokter
        $appointment = new Appointments;

        // Set attributes
        $appointment->patient_id = $request->input('patient_id');
        $appointment->doctor_id = $doctorId;
        $appointment->patient_complaints = $request->input('patient_complaints');
        $appointment->status = $request->input('status');
        $appointment->queue_number = $request->input('queue_number');
        $appointment->appointment_date = $request->input('appointment_date');
        // ... tambahkan field lainnya

        $appointment->save();

        // Access the doctor through the relationship
        $doctor = $appointment->doctor;

        return redirect()->back()->with(['success' => 'Jadwal temu berhasil dibuat.', 'doctor' => $doctor]);
    }
     

    public function editAppointment($id){
        $appointment = Appointments::findOrFail($id);
        
        return view('dokter.edit-appointment', compact('appointment'));
    }
    

    public function updateAppointment(Request $request, $id){
        $request->validate([
            'patient_complaints' => 'required',
            'status' => 'required'
        ]);
    
        $appointment = Appointments::findOrFail($id);
    
        // Hanya mengupdate atribut yang ada dalam $fillable di model
        $appointment->update($request->only(['patient_complaints', 'status']));
    
        return redirect()->route('edit-appointment', ['id' => $id])->with('message', 'Doctor updated successfully');
    }

    public function destroyappointment($id){
        $appointment = Appointments::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('message', 'Doctor deleted successfully');        
    }

    // Medical Records
    public function medicalrecordsview(){
        $medicalrecords = MedicalRecords::paginate(3);

        return view('dokter.medicalrecords', compact('medicalrecords'));
    }

    public function createmedicalrecords(){
        // Mengambil daftar pasien untuk formulir
        $patients = Patients::all();

        return view('dokter.add-medicalrecords', ['patients' => $patients]);
    }

    public function uploadmedicalrecords(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'action' => 'required|string'
        ], [
            'patient_id.exists' => 'The selected patient is invalid.'
            // Add more custom messages as needed
        ]);

        // Mengambil ID dokter yang sedang login
        $doctorId = Auth::id();

        // Membuat janji temu dengan menyertakan ID dokter
        $medicalrecords = new Medicalrecords;

        // Set attributes
        $medicalrecords->patient_id = $request->input('patient_id');
        $medicalrecords->doctor_id = $doctorId;
        $medicalrecords->action = $request->input('action');
        // ... tambahkan field lainnya

        // $medicalrecords->save();

        // Access the doctor through the relationship
        $doctor = $medicalrecords->doctor;

        if ($medicalrecords->save()) {
            return redirect()->back()->with(['success' => 'Jadwal temu berhasil dibuat.', 'doctor' => $doctor]);
        } else {
            return redirect()->back()->with(['error' => 'Gagal membuat jadwal temu. Silakan coba lagi.']);
        }
        ;
    }
     

    public function editmedicalrecords($id){
        $medicalrecords = Medicalrecords::findOrFail($id);
        $patients = Patients::all();
        
        return view('dokter.edit-medicalrecords', compact('medicalrecords' , 'patients'))->with('message', 'Medicalrecords updated successfully');
    }
    

    public function updatemedicalrecords(Request $request, $id){
        $request->validate([
            'patient_complaints' => 'required',
            'status' => 'required'
        ]);
    
        $medicalrecords = Medicalrecords::findOrFail($id);
    
        // Hanya mengupdate atribut yang ada dalam $fillable di model
        $medicalrecords->update($request->only(['patient_complaints', 'status']));
    
        return redirect()->route('edit-medicalrecords', ['id' => $id])->with('message', 'Doctor updated successfully');
    }

    public function destroymedicalrecords($id){
        $medicalrecords = Medicalrecords::findOrFail($id);
        $medicalrecords->delete();

        return redirect()->back()->with('message', 'Doctor deleted successfully');        
    }
}
