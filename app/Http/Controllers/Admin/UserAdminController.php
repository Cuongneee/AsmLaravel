<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserAdminController extends Controller
{
    public function index()
    {

        $users = User::paginate(10);

        // dd($uses);

        return view('admin.users.index', compact('users'));
    }

    public function userDeactivate(User $user)
    {
        try {

            $user->update(['active' => 0]);

            return back()->with('success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function userActivate(User $user)
    {
        try {

            $user->update(['active' => 1]);

            return back()->with('success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));

    }
}