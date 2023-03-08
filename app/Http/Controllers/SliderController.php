<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Title;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::with('manga')->orderBy('urutan')->get();
        $title = Title::select('id', 'atas_rilisan_terbaru', 'is_most_rating')->first();
        $manga = Manga::all();
        return view('pages.slider.index', compact('slider', 'manga', 'title'));
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
        if (Slider::where('urutan', $request->urutan)->orWhere('manga_id', $request->manga_id)->exists()) {
            return redirect()->route('sliders.index')->with('error', 'Manga/Urutan sudah didaftarkan.');
        }
        Slider::create($request->all());
        return redirect()->route('sliders.index')->with('message', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if (Slider::where('urutan', $request->urutan)->orWhere('manga_id', $request->manga_id)->exists()) {
            return redirect()->route('sliders.index')->with('error', 'Urutan sudah didaftarkan.');
        }
        $slider->update([
            'urutan' => $request->urutan
        ]);
        return redirect()->route('sliders.index')->with('message', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->with('message', 'Berhasil dihapus');
    }

    public function update_title(Request $request, $id)
    {
        Title::where('id', $id)->update([
            'atas_rilisan_terbaru' => $request->judul,
            'is_most_rating' => $request->is_most_rating
        ]);
        return redirect()->back()->with('title', 'Berhasil diubah');
    }
}
