<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role', 'unit')->get();
        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('role', 'unit')->findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function create()
    {
        $roles = Role::all();
        $units = Unit::all();
        return view('user.create', compact('roles', 'units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role_id' => 'required|integer|exists:roles,id',
            'is_active' => 'required|boolean',
            'unit_id' => 'nullable|integer|exists:units,id',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',

        ]);
 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active,
            'unit_id' => $request->unit_id,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $units = Unit::all();
        return view('user.edit', compact('user', 'roles', 'units'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role_id' => 'required|integer|exists:roles,id',
            'is_active' => 'required|boolean',
            'unit_id' => 'nullable|integer|exists:units,id',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active,
            'unit_id' => $request->unit_id,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}