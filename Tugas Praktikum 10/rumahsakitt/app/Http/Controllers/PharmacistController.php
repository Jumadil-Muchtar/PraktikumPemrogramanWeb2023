<?php

namespace App\Http\Controllers;

use App\Models\Medicines;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    public function medicinesview(){
        $medicines = Medicines::paginate(3);

        return view('pharmacist.medicines', compact('medicines'));
    }

    public function createmedicines(){

        return view('pharmacist.add-medicines');
    }

    public function uploadmedicines(Request $request){
        // image
        $medicines = new Medicines;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('medicinesimage', $imageName);
            $medicines->image = $imageName;
        }

        $medicines->name=$request->name;
        $medicines->description=$request->description;
        $medicines->type=$request->type;
        $medicines->stock=$request->stock;
        $medicines->price=$request->price;

        $medicines->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');    
    }

    public function editmedicines($id){
        $medicines = Medicines::findOrFail($id);
        
        return view('pharmacist.edit-medicines', compact('medicines'));
    }
    

    public function updatemedicines(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000', // Pastikan hanya menerima file gambar
        ]);
    
        $medicines = Medicines::findOrFail($id);
    
        // Hanya mengupdate atribut yang ada dalam $fillable di model
        $medicines->update($request->only(['name', 'phone', 'room', 'spesialis']));
    
        // Mengelola file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('medicinesimage', $imageName);
            $medicines->image = $imageName;
            $medicines->save();
        }
    
        return redirect()->route('edit-medicines', ['id' => $id])->with('message', 'medicines updated successfully');
    }

    public function destroymedicines($id){
        $medicines = Medicines::findOrFail($id);
        $medicines->delete();

        return redirect()->back()->with('message', 'medicines deleted successfully');        
    }
}
