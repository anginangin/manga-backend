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
        $this->authorize('pages_view');
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
        $this->authorize('pages_create');
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
        $this->authorize('pages_create');
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
        $this->authorize('pages_update');
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
        $this->authorize('pages_update');
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
        $this->authorize('pages_delete');
        $page = Page::findOrFail($id);

        if ($page->delete()) {
            return redirect()->route('pages.index')->with('message', 'Berhasil dihapus');
        }
        return redirect()->route('pages.index')->with('error', 'Gagal dihapus');
    }
}
