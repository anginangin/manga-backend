<?php

namespace App\Http\Controllers;

use App\Models\Web;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingWebController extends Controller
{
    public function index()
    {
        $web = Web::orderBy('id', 'desc')->first();
        return view('pages.setting_web.index', compact('web'));
    }

    public function create()
    {
        return view('pages.setting_web.create');
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {
        $web = Web::findOrFail($id);
        return view('pages.setting_web.edit', compact('web'));
    }

    public function update(Request $request, $id)
    {
        if ($request->file('icon')) {
            $icon = $request->file('icon');
            $nama_icon = time() . "_" . $icon->getClientOriginalName();
            $tujuan_upload = 'logo';
            if ($request->old_icon) {
                $filePathName = 'logo/' . $request->old_icon;
                if (file_exists($filePathName)) {
                    unlink($filePathName);
                }
            }
            $icon->move($tujuan_upload, $nama_icon);
        } else {
            $nama_icon = $request->old_icon;
        }

        if ($request->file('logo')) {
            $logo = $request->file('logo');
            $nama_logo = time() . "_" . $logo->getClientOriginalName();
            $tujuan_upload = 'logo';
            if ($request->old_logo) {
                $filePathName = 'logo/' . $request->old_logo;
                if (file_exists($filePathName)) {
                    unlink($filePathName);
                }
            }
            $logo->move($tujuan_upload, $nama_logo);
        } else {
            $nama_logo = $request->old_logo;
        }

        Web::where('id', $id)->update([
            'icon' => $nama_icon,
            'logo' => $nama_logo,
            'description' => $request->description
        ]);

        return redirect()->back()->with('message', 'Berhasil diubah');
    }
}
