<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('backend.user-management.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.user-management.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role'          => 'required',
            'name'          => 'required',
            'email'         => 'required|unique:users',
            'password'      => 'required|min:8',
            'c-password'    => 'required|same:password',
        ]);

        $role = Role::find($request->role);

        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ])->assignRole($role);


        if($request->file('avatar')){
            $this->uploadFileWithResize($request->avatar, $user, 'avatar', 'user',250,250);
        }

        toastr()->success('User Created');
        return to_route('userManagement.user.index');
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
        $roles = Role::all();
        $user = User::find($id);
        return view('backend.user-management.user.create',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role'          => 'required',
            'name'          => 'required',
            'email'         => 'required',
            'password'      => '',
            'c-password'    => 'same:password',
        ]);

        $role = Role::find($request->role);

        $user = User::find($id);

        $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
            ]);
        
        $user->syncRoles($request->role);


        if($request->file('avatar')){
            $this->upload_file($request->avatar, $user, 'avatar', 'user');
        }

        toastr()->success('User Updated');
        return to_route('userManagement.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $user = User::find($id);
       // <!-- delete file if exist -->
       if (file_exists($user->avatar)){
            unlink($user->avatar);
        }

        $user->delete();
        toastr()->success('User Deleted');
        return redirect()->back();
    }
}
