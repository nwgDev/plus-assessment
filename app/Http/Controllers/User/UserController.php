<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Requests\UserCreateRequest;
use App\Http\Controllers\User\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        if(Auth::user()->name === 'admin') {
            return $users;

        } elseif (Auth::user()->name === 'content manager') {
            return $users;
        }

        return view('dashboard');
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('admin.users.add');
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'name' => strtolower($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return $user;
    }

    public function edit(Request $request)
    {
        return view('user.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(UserUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        $request->user()->firstname = $request->firstname;
        $request->user()->lastname = $request->lastname;
        $request->user()->name = strtolower($request->name);

        $request->user()->save();

        return redirect()->route('admin.dashboard')->with('status', 'User successfully updated');
    }

}
