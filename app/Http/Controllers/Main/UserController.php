<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
use App\Http\Requests\Auth\UpdateRequest;
use App\Models\Category;
use App\Models\User;
use Couchbase\Role;

class UserController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('main.user', compact('users'));
    }
    public function create()
    {
        return view('main.user_create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        User::firstOrCreate([
            'email' => $data['email'],
        ], $data);
        return redirect()->route('admin.user');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user');
    }

    public function edit(User $user)
    {
        return view('main.user_edit', compact('user'));
    }

    public function show(User $user)
    {
        $roles = User::getRoles();
        return view('main.user_show', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user');
    }
}
