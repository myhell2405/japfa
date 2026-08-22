<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        return view('manajer.users.index', compact('users'));
    }

    public function create()
    {
        return view('manajer.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string',
            'phone' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('manajer.users.index')->with('success','User dibuat.');
    }

    public function show(User $user)
    {
        return view('manajer.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('manajer.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|string',
            'phone' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);

        if(!empty($data['password'])){
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('manajer.users.index')->with('success','User diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('manajer.users.index')->with('success','User dihapus.');
    }
}
