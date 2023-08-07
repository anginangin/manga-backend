<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('banner_view');
        $banner = Banner::latest('id')->get();
        return view('pages.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('banner_create');
        return view('pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('banner_create');
        $gambar = $request->file('gambar');
        $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
        $tujuan_upload = 'banner';
        $gambar->move($tujuan_upload, $nama_gambar);

        Banner::create([
            'name' => $request->name,
            'posisi' => $request->posisi,
            'gambar' => $nama_gambar,
            'link' => $request->link,
            'status' => $request->status
        ]);

        return redirect()->route('banners.index')->with('message', 'Berhasil ditambahkan');
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
        $this->authorize('banner_update');
        $banner = Banner::findOrFail($id);
        return view('pages.banner.edit', compact('banner'));
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
        $this->authorize('banner_update');
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . "_" . $gambar->getClientOriginalName();
            $tujuan_upload = 'banner';
            if ($request->old_gambar) {
                $filePathName = 'banner/' . $request->old_gambar;
                if (file_exists($filePathName)) {
                    unlink($filePathName);
                }
            }
            $gambar->move($tujuan_upload, $nama_gambar);
        }else{
            $nama_gambar = $request->valgambar;
        }

        Banner::where('id', $id)->update([
            'name' => $request->name,
            'posisi' => $request->posisi,
            'gambar' => $nama_gambar,
            'link' => $request->link,
            'status' => $request->status
        ]);

        return redirect()->route('banners.index')->with('message', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('banner_delete');
        Banner::destroy($id);
        return redirect()->route('banners.index')->with('message', 'Berhasil dihapus');
    }
}
