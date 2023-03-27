<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Title;
use Illuminate\Http\Request;

class RilisanTerbaru extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('rilisan_terbaru_view');
        $mangas = Manga::where(['domain' => 'https://kiryuu.id', 'is_blacklist' => 0])->take(30)->orderBy('id','desc')->get();
        $title = Title::select('id','rilisan_terbaru')->first();
        return view('pages.homepage_fe.rilisan_terbaru.index', compact('mangas', 'title'));
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
        //
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
        $this->authorize('rilisan_terbaru_update');
        Title::where('id', $id)->update([
            'rilisan_terbaru' => $request->judul
        ]);
        return redirect()->route('rilisan-terbaru.index')->with('title', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manga  $manga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manga $manga)
    {
        //
    }
}
