<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionInRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
       $permissionGroups = User::getPermissionGroup();
       $role = Role::find($id);

       return view('backend.user-management.permissionsInRole.create',compact('permissionGroups','role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission_ids' => 'required',
            'role_id' => 'required'
        ]);

        $role = Role::find($request->role_id);
        $role->syncPermissions([$request['permission_ids'], $request['permission_ids']]);

        toastr()->success('Role permission updated');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
