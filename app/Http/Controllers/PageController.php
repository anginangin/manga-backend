<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'unique:pages,title',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        if (Page::create($data)) {
            return redirect()->route('pages.index')->with('message', 'Berhasil ditambahkan');
        }
        return redirect()->route('pages.index')->with('error', 'Gagal ditambahkan');
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
        $page = Page::findOrFail($id);

        return view('pages.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Responseoc
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'unique:pages,title,' . $id,
            ],
        );
        $page = Page::findOrFail($id);

        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);

        if ($page->update($data)) {
            return redirect()->route('pages.index')->with('message', 'Berhasil diupdate');
        }
        return redirect()->route('pages.index')->with('error', 'Gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        if ($page->delete()) {
            return redirect()->route('pages.index')->with('message', 'Berhasil dihapus');
        }
        return redirect()->route('pages.index')->with('error', 'Gagal dihapus');
    }
}
