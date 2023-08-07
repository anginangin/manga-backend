<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('roles_view');
        $roles = Role::latest('id')->get();
        return view('pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('roles_create');
        return view('pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('roles_create');
        Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('roles.index')->with('message', 'Berhasil Ditambahkan');

        // $role = Role::where('name', $request->name)->firstOrFail();
        // if ($role->syncPermissions($request->data, [])) {
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Success',
        //     ]);
        // }
        // return response()->json([
        //     'status' => false,
        //     'message' => 'Error',
        // ]);
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
        $this->authorize('roles_update');
        $roles = Role::findOrFail($id);
        $roles->load('permissions');
        $permissions =  $roles->permissions->pluck('name');
        $permissions[] = '';
        return view('pages.roles.edit', compact('roles','permissions'));
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
        $this->authorize('roles_update');
        $request->validate([
            'name' => 'unique:roles,name,' . $id,
        ]);

        $role = Role::where('name', $request->name)->firstOrFail();

        $role->update([
            'name' => $request->name,
        ]);
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
        return redirect()->route('roles.index')->with('error', 'Gagal ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('roles_delete');
        Role::destroy($id);
        return redirect()->route('roles.index')->with('message', 'Berhasil dihapus');
    }
}
