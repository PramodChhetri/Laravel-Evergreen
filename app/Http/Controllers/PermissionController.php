<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        $allpermissions = Permission::all();
        return view('permissions.index',compact('allpermissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]
    );

        Permission::create($data);
        return redirect(route('permissions.index'))->with('success','Permission Created Successfully!');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permissions.edit',compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $data = $request->validate([
            'name' => 'required|max:255|unique:permissions,name,'.$permission->id,
        ]);

        $permission = Permission::find($id);
        $permission->update($data);
        return redirect(route('permissions.index'))->with('success','Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $permission = Permission::find($request->dataid);
        $permission->delete();
        return redirect(route('permissions.index'))->with('success','Deleted Successfully!');
    }
}
