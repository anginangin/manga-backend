<?php

namespace App\Http\Controllers;

use App\Models\Adds;
use Illuminate\Http\Request;

class AddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('iklan_view');
        $adds = Adds::latest('id')->get();
        return view('pages.adds.index', compact('adds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('iklan_create');
        return view('pages.adds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('iklan_create');
        Adds::create([
            'script' => $request->script,
            'status' => $request->status,
            'posisi' => $request->posisi
        ]);
        return redirect()->route('adds.index')->with('message', 'Berhasil ditambahkan');
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
        $this->authorize('iklan_update');
        $adds = Adds::findOrFail($id);
        return view('pages.adds.edit', compact('adds'));
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
        $this->authorize('iklan_update');
        Adds::where('id', $id)->update([
            'script' => $request->script,
            'status' => $request->status,
            'posisi' => $request->posisi
        ]);
        return redirect()->route('adds.index')->with('message', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('iklan_delete');
        Adds::destroy($id);
        return redirect()->route('adds.index')->with('message', 'Berhasil dihapus');
    }
}
