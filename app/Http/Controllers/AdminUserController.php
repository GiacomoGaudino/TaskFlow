<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $users = User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }

    public function toggleRole(User $user)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $adminRole = Role::where('name', 'admin')->firstOrFail();

        if ($user->roles->contains($adminRole->id)) {
            $user->roles()->detach($adminRole->id);
        } else {
            $user->roles()->attach($adminRole->id);
        }

        return back()->with('success', 'Ruolo aggiornato');
    }
}
