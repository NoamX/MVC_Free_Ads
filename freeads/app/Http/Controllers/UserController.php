<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function showProfile()
    {
        $this->read();
        return view('profile');
    }

    public function editProfile()
    {
        $this->udpate();
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
        // passer les donner de $post
        if (isset($_POST['name'])) {
            foreach ($_POST as $key => $value) {
                if (!empty($_POST[$key])) {
                    if ($key == 'password') {
                        $arr[$key] = Hash::make($value);
                    } else {
                        $arr[$key] = $value;
                    }
                    $arr['updated_at'] = NOW();
                }
            };
            array_shift($arr);
            if (!empty($_POST['password']) && !empty($_POST['password_confirm'])) {
                if ($_POST['password'] == $_POST['password_confirm']) {
                    array_pop($arr);
                    $user = auth()->user();
                    $update = DB::table('users')
                        ->where('id', $user->id)
                        ->update($arr);
                } else {
                    echo '<div class="alert alert-danger">Password are not same</div>';
                }
            } else {
                $user = auth()->user();
                $update = DB::table('users')
                    ->where('id', $user->id)
                    ->update($arr);
            }
        }
    }

    public function delete()
    {
        $user = auth()->user();
        DB::table('users')->where('id', $user->id)->delete();
    }
}
