<?php

namespace App\Http\Controllers;

use App\Models\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    public function index(){
        $seo = SEO::orderBy('id','desc')->first();
        return view('pages.seo.index', compact('seo'));
    }

    public function create(){
        return view('pages.seo.create');
    }

    public function store(Request $request){
        SEO::create([
            'title' => $request->title,
            'meta_tag' => $request->meta_tag,
            'artikel' => $request->artikel
        ]);
        return redirect()->route('seo-artikel')->with('message', 'Berhasil disimpan!');
    }

    public function edit($id){
        $this->authorize('seo_view');
        $seo = SEO::findOrFail($id);
        return view('pages.seo.edit', compact('seo'));
    }

    public function update(Request $request, $id){
        $this->authorize('seo_update');
        $seo = SEO::find($id);
        $seo->title = $request->title;
        $seo->meta_tag = $request->meta_tag;
        $seo->artikel = $request->artikel;
        $seo->save();
        return redirect()->back()->with('message', 'Berhasil diubah!');
    }
}
