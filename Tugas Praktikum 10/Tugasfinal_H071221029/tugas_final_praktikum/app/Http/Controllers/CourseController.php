<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function homepage(Request $request)
    {
        $search = $request->input('search');

    // Query untuk mencari course sesuai dengan kata kunci pencarian
        $courses = Course::where('course_name', 'like', "%$search%")->get();
        return view('homepage', compact('courses'));
    }

    public function coursecatalog()
    {
        $courses = Course::all();
        return view('courses.catalog', compact('courses'));
    }

    public function create()
    {
        $courses = new Course();
        return view('courses.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $courses = new Course();
        $courses -> course_name = $request -> course_name;
        $courses -> description = $request -> description;
        $courses -> start_date = $request -> start_date;
        $courses -> end_date = $request -> end_date;
        $courses -> instructor = $request -> instructor;
        $courses -> instructor_number = $request -> instructor_number;
        $courses -> save();

        return redirect()->to('courses')->with('success', 'Course berhasil disimpan');
    }

    public function edit($id)
    {
        
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->update($request->all());
        return redirect()->to('courses')->with('Success', 'Course berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->to('courses')->with('success', 'Course berhasil dihapus');
    }
}
