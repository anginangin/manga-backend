<?php

namespace App\Http\Controllers;

use App\Models\ThemeColor;
use App\Models\Web;
use Illuminate\Http\Request;

class ThemeColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themeColor = ThemeColor::all();
        return view('pages.theme_color.index', compact('themeColor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.theme_color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ThemeColor::create(['theme_name'    => $request->theme_name,
            'primary_color' => $request->primary_color,
            'secondary_color' => $request->secondary_color,
            'primary_base_color' => $request->primary_base_color,
            'secondary_base_color' => $request->secondary_base_color,
            'tertiary_base_color' => $request->tertiary_base_color,
            'button_color' => $request->button_color,
            'text_color' => $request->text_color 
        ]);
        return redirect()->route('theme-color.index')->with('message', 'Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = ThemeColor::findOrFail($id);
        return view('pages.theme_color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ThemeColor::where('id', $id)->update([
            'theme_name'    => $request->theme_name,
            'primary_color' => $request->primary_color,
            'secondary_color' => $request->secondary_color,
            'primary_base_color' => $request->primary_base_color,
            'secondary_base_color' => $request->secondary_base_color,
            'tertiary_base_color' => $request->tertiary_base_color,
            'button_color' => $request->button_color,
            'text_color' => $request->text_color 
        ]);
        return redirect()->route('theme-color.index')->with('message', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ThemeColor::destroy($id);
        return redirect()->route('theme-color.index')->with('message', 'Berhasil dihapus');
    }

    public function updateTheme(Request $request){
        Web::where('id', 1)->update(['theme_id' => $request->theme_id]);
        return redirect()->back()->with('message', 'Berhasil ganti tema!');
    }
}
