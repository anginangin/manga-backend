<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Rating;
use App\Models\Chapter;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list_manga_view');
        $manga = Manga::where('is_blacklist', 0)->orderBy('id', 'desc')->get();
        return view('pages.manga.index',compact('manga'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('list_manga_view');
        $detail = Manga::with('chapters')->where('slug',$id)->first();
        $rating = Rating::where('manga_id',$detail['id'])->first();
        $comment = Comment::where('commentable_id', $detail['id'])->get();
        $mangaViews = DB::table('manga_view')->select('manga_id')->where('manga_id', $detail->id)->get();

        return view('pages.manga.detail', compact('detail','rating','comment', 'mangaViews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->authorize('list_manga_update');
        $key = $request->key;
        $value = $request->value;
        $data = [];
        foreach ($value as $i => $val) {
            $data[] = [
              "key" => $key[$i],
              "value" => $value[$i]
            ];
        }
        Manga::where('id', $id)->update(['information' => $data]);
        return redirect()->back()->with('message', 'Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_chapter($id){
        $this->authorize('list_manga_delete');
        Chapter::destroy($id);
        return redirect()->back()->with('message', 'Berhasil dihapus!');
    }

    public function blacklist($id){
        $this->authorize('list_manga_delete');
        Manga::where('id', $id)->update(['is_blacklist' => 1]);
        return redirect()->back()->with('message', 'Berhasil dihapus!');
    }
}
