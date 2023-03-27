<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function administrator()
    {
        $this->authorize('administrator_view');
        $administrator = User::where('role', 2)->orderBy('id', 'desc')->get();
        return view('pages.user.administrator', compact('administrator'));
    }

    public function member()
    {
        $this->authorize('member_view');
        $member = User::where('role', 0)->orderBy('id', 'desc')->get();
        return view('pages.user.member', compact('member'));
    }

    public function create()
    {
        $this->authorize('administrator_create');
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $this->authorize('administrator_create');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2
        ]);
        $user->assignRole('Administrator');
        return redirect()->route('administrator')->with('message', 'Berhasil disimpan!');
    }

    public function edit($id)
    {
        $this->authorize('administrator_update');
        $administrator = User::findOrFail($id);
        return view('pages.user.edit', compact('administrator'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('administrator_update');
        $administrator = User::findOrFail($id);
        $administrator->name = $request->name;
        $administrator->email = $request->email;
        $administrator->password = Hash::make($request->password);
        $administrator->save();
        return redirect()->route('administrator')->with('message', 'Berhasil update!');
    }

    public function permission()
    {
        $this->authorize('administrator_permission');
        $role = Role::where('name', 'Administrator')->firstOrFail();
        $role->load('permissions');
        $permissions =  $role->permissions->pluck('name');
        $permissions[] = '';
        return view('pages.user.permission', compact('permissions'));
    }

    public function permissionUpdate(Request $request)
    {
        $this->authorize('administrator_permission');
        $role = Role::where('name', 'Administrator')->firstOrFail();
        if ($role->syncPermissions($request->data, [])) {
            return response()->json([
                'status' => true,
                'message' => 'Success',
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Error',
        ]);
    }

    public function delete($id)
    {
        $this->authorize('administrator_delete');
        $administrator = User::where('role', 2)->where('id', $id)->firstOrFail();

        if ($administrator->delete()) {
            return redirect()->route('administrator')->with('message', 'Berhasil dihapus!');
        }
        return redirect()->route('administrator')->with('error', 'Gagal dihapus!');
    }
}
