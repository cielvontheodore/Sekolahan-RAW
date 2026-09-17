<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::whereIn('role', ['admin', 'super_admin'])
        ->latest()
        ->get();

        return view('admindir.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admindir.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $validate['role'] = 'admin';

        User::create($validate);

        return redirect()
            ->route('admin-admins.index')
            ->with('success', 'Admin created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('admindir.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                \Illuminate\Validation\Rule::unique('users', 'email')->ignore($admin->id),
            ],
            'role' => ['required', 'in:admin,super_admin'],
            'password' => ['nullable', 'string', 'confirmed'],
        ]);

        if (empty($validate['password'])) {
            unset($validate['password']);
        }

        $admin->update($validate);

        return redirect()
            ->route('admin-admins.index')
            ->with('success', 'Admin updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        // Can't delete yourself
        if ($admin->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }
    
        // Can't delete the last Super Admin
        if ($admin->role === 'super_admin') {
            $superAdminCount = User::where('role', 'super_admin')->count();
    
            if ($superAdminCount <= 1) {
                return back()->with(
                    'error',
                    'You cannot delete the last Super Admin.'
                );
            }
        }
    
        $admin->delete();
    
        return redirect()
            ->route('admin-admins.index')
            ->with('success', 'Admin deleted successfully.');
    }
}
