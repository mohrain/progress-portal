<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $user;

    public function __contruct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return User::with('roles')->where('id','!=', 1)->latest()->get();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function create($request)
    {
        $user = new User();
        $user->fill([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
        ]);
        $user->password =  Hash::make($request['password']);
        $user->save();
        return $user;
    }

    public function update(User $user, $request)
    {
        $user->fill([
            'name' => $request['name'],
            'username' => $request['username'],
        ]);
        $user->save();
        return $user;
    }

    public function changePassword($user, $request)
    {
        $user->password = Hash::make($request['new_password']);
        return $user->save();
    }

    public function validateUserPassword($password)
    {
        return Hash::check($password, auth()->user()->password);
    }
}
