<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Patients;
use App\Models\Pharmacist;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function doctorview(){
        $doctor = Doctor::paginate(3);
        
        return view('admin.doctor', compact('doctor'));
    }

    public function createdoctor(){

        return view('admin.add-doctor');
    }

    public function upload(Request $request){
        // image
        $doctor=new doctor;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('doctorimage', $imageName);
            $doctor->image = $imageName;
        }

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->spesialis=$request->spesialis;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');    
    }

    public function editDoctor($id){
        $doctor = Doctor::findOrFail($id);
        
        return view('admin.edit-doctor', compact('doctor'));
    }
    

    public function updateDoctor(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'room' => 'required',
            'spesialis' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000', // Pastikan hanya menerima file gambar
        ]);
    
        $doctor = Doctor::findOrFail($id);
    
        // Hanya mengupdate atribut yang ada dalam $fillable di model
        $doctor->update($request->only(['name', 'phone', 'room', 'spesialis']));
    
        // Mengelola file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('doctorimage', $imageName);
            $doctor->image = $imageName;
            $doctor->save();
        }
    
        return redirect()->route('edit-doctor', ['id' => $id])->with('message', 'Doctor updated successfully');
    }

    public function destroy($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->back()->with('message', 'Doctor deleted successfully');        
    }

    // APOTEKER
    public function apotekerview(){
        $pharmacist = pharmacist::paginate(3);
        
        return view('admin.pharmacist',  compact('pharmacist'));
    }

    public function createpharmacist(){

        return view('admin.add-pharmacist');
    }

    public function uploadpharmacist(Request $request){
        // image
        $pharmacist=new Pharmacist;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('pharmacistimage', $imageName);
            $pharmacist->image = $imageName;
        }

        $pharmacist->name=$request->name;
        $pharmacist->phone=$request->phone;

        $pharmacist->save();

        return redirect()->back()->with('message', 'Pharmacist Added Successfully');    
    }

    public function editPharmacist($id){
        $pharmacist = Pharmacist::findOrFail($id);
        
        return view('admin.edit-pharmacist', compact('pharmacist'));
    }
    

    public function updatePharmacist(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000', // Pastikan hanya menerima file gambar
        ]);
    
        $pharmacist = Pharmacist::findOrFail($id);
    
        // Hanya mengupdate atribut yang ada dalam $fillable di model
        $pharmacist->update($request->only(['name', 'phone']));
    
        // Mengelola file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('pharmacistimage', $imageName);
            $pharmacist->image = $imageName;
            $pharmacist->save();
        }
    
        return redirect()->route('edit-doctor', ['id' => $id])->with('message', 'Doctor updated successfully');
    }

    public function destroypharmacist($id){
        $pharmacist = Pharmacist::findOrFail($id);
        $pharmacist->delete();

        return redirect()->back()->with('message', 'Doctor deleted successfully');        
    }

    //PASIEN
    public function pasienview(){
        $patient = Patients::paginate(3);
        
        return view('admin.patient',  compact('patient'));
    }

    public function createpatient(){

        return view('admin.add-patient');
    }

    public function uploadpatient(Request $request){
        // image
        $patient=new Patients;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('patientimage', $imageName);
            $patient->image = $imageName;
        }

        $patient->name=$request->name;
        $patient->gender=$request->gender;
        $patient->origin=$request->origin;
        $patient->birth=$request->birth;
        $patient->year=$request->year;
        $patient->treatment=$request->treatment;
        $patient->phone=$request->phone;

        $patient->save();

        return redirect()->back()->with('message', 'Patient Added Successfully');    
    }

    public function editPatient($id){
        $patient = Patients::findOrFail($id);
        
        return view('admin.edit-patient', compact('patient'));
    }
    

    public function updatePatient(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'origin' => 'required',
            'birth' => 'required',
            'year' => 'required',
            'treatment' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000', // Pastikan hanya menerima file gambar
        ]);
    
        $patient = Patients::findOrFail($id);
    
        // Hanya mengupdate atribut yang ada dalam $fillable di model
        $patient->update($request->only(['name', 'gender', 'origin', 'birth', 'year', 'treatment', 'phone', 'image']));
    
        // Mengelola file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('patientimage', $imageName);
            $patient->image = $imageName;
            $patient->save();
        }
    
        return redirect()->route('edit-patient', ['id' => $id])->with('message', 'Patient updated successfully');
    }

    public function destroypatient($id){
        $patient = Patients::findOrFail($id);
        $patient->delete();

        return redirect()->back()->with('message', 'Patient deleted successfully');        
    }

}
