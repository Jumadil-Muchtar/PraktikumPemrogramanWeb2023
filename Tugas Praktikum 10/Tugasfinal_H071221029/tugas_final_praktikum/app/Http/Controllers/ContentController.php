<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('contents.index', compact('contents'));
    }
    public function index2()
    {
        $contents = Content::all();
        return view('lessonPage', compact('contents'));
    }
    

    public function create()
    {
        $content = new Content();
        return view('contents.create', compact('content'));
    }

    public function store(Request $request)
    {
        $content = new Content();
        $content -> title = $request -> title;
        $content -> content = $request -> content;
        $content -> save();

        return redirect()->to('contents')->with('success', 'Content berhasil disimpan');
    }

    public function edit($id)
    {
        $content = Content::find($id);
        return view('contents.edit', compact('content'));
    }

    public function update(Request $request, $id)

    {
        $content = Content::find($id);
        $content->update($request->all());
        return redirect()->to('contents')->with('success', 'Content berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect()->to('contents')->with('success', 'Content berhasil dihapus');
    }
}
