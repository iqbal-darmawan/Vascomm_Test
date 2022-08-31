<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_approved', 0)->get();
        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit',[
            'user' => $user
        ]);
    }

    public function changeStatus(Request $request, User $user)
    {
        $user->is_approved = 1;
        $user->save();

        return redirect('/admin/user');
    }
}
