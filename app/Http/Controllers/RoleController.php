<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {

        // Get Data Except few eg;admin
        // $exceptadmin = Role::whereNotIn('name',['admin','buyer'])->get();

        $allroles = Role::all();
        return view('roles.index', compact('allroles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:roles|max:255',
            ]
        );

        Role::create($data);
        return redirect(route('roles.index'))->with('success', 'Role Created Successfully!');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $data = $request->validate([
            'name' => 'required|max:255|unique:roles,name,' . $role->id,
        ]);

        $role = Role::find($id);
        $role->update($data);
        return redirect(route('roles.index'))->with('success', 'Role Updated Successfully');
    }

    public function assignpermission($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('roles.assignpermission', compact('role', 'permissions'));
    }

    public function updatepermission(Request $request, $id)
    {
        $role = Role::find($id);
        $role->permissions()->sync($request->permissions);
        return redirect(route('roles.index'))->with('success', 'Permissions Assigned Successfully');
    }

    public function destroy(Request $request)
    {
        $role = Role::find($request->dataid);
        $role->delete();
        return redirect(route('roles.index'))->with('success', 'Role Deleted Successfully!');
    }
}
