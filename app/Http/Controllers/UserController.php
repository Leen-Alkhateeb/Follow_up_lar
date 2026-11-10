<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Read: عرض الكل
    public function index()
    {
        $users = User::with('seller')->latest()->get();
        return view('users.index', compact('users'));
    }

    // فورم الإضافة
    public function create()
    {
        return view('users.create');
    }

    // Create: حفظ مستخدم جديد
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created');
    }

    // Read: عرض مستخدم واحد
    public function show(User $user)
    {
        $user->load('seller');
        return view('users.show', compact('user'));
    }

    // فورم التعديل
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update: حفظ التعديل
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated');
    }

    // Delete
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted');
    }
}