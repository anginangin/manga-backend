<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function administrator(){
        $administrator = User::where('role', 1)->orderBy('id', 'desc')->get();
        return view('pages.user.administrator', compact('administrator'));
    }

    public function member(){
        $member = User::where('role',0)->orderBy('id', 'desc')->get();
        return view('pages.user.member', compact('member'));
    }

    public function create(){
        return view('pages.user.create');
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1
        ]);
        return redirect()->route('administrator')->with('message', 'Berhasil disimpan!');
    }

    public function edit($id){
        $administrator = User::findOrFail($id);
        return view('pages.user.edit', compact('administrator'));
    }

    public function update(Request $request, $id){
        $administrator = User::findOrFail($id);
        $administrator->name = $request->name;
        $administrator->email = $request->email;
        $administrator->password = Hash::make($request->password);
        $administrator->save();
        return redirect()->route('administrator')->with('message', 'Berhasil update!');
    }
}
