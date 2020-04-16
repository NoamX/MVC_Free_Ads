<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function showProfile()
    {
        return view('profile');
    }

    public function editProfile()
    {
        return view('edit_profile');
    }

    public function create()
    {
        // c'est dans migration frr
    }

    public function read()
    {
        $user = auth()->user();
        return ['id' => $user->id, 'name' => $user->name, 'email' => $user->email];
    }

    public function udpate()
    {
        $user = auth()->user();
        $update = DB::table('users')
            ->where('id', $user->id)
            ->update(['name' => 'Noam']);
    }

    public function delete()
    {
        $user = auth()->user();
        DB::table('users')->where('id', $user->id)->delete();
    }
}
