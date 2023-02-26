<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Title;
use App\Models\Recommend;
use Illuminate\Http\Request;

class RecommendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommends = Recommend::with('manga')->orderBy('urutan')->get();
        $title = Title::select('id', 'rekomendasi')->first();
        $manga = Manga::all();
        return view('pages.homepage_fe.slider_recommend.index', compact('recommends', 'title', 'manga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Recommend::where('urutan', $request->urutan)->orWhere('manga_id', $request->manga_id)->exists()) {
            return redirect()->back()->with('error', 'Manga/Urutan sudah didaftarkan.');
        }
        Recommend::create($request->all());
        return redirect()->back()->with('message', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function show(Manga $manga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function edit(Manga $manga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Recommend::where('urutan', $request->urutan)->orWhere('manga_id', $request->manga_id)->exists()) {
            return redirect()->back()->with('error', 'Manga/Urutan sudah didaftarkan.');
        }
        Recommend::where('id', $id)->update([
            'urutan' => $request->urutan
        ]);
        return redirect()->back()->with('message', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recommend::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Berhasil dihapus');
    }

    public function update_title(Request $request, $id){
        Title::where('id', $id)->update([
            'rekomendasi' => $request->judul
        ]);
        return redirect()->back()->with('title', 'Berhasil diubah');
    }
}
