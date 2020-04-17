<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $errorMessage = '';
        if (isset($_POST['submit'])) {
            foreach ($_POST as $key => $value) {
                if ($key != '_token' && $value) {
                    $post[$key] = $value;
                    if (!empty($_POST['password']) && !empty($_POST['password_confirm'])) {
                        if ($_POST['password'] == $_POST['password_confirm']) {
                            $post[$key] = Hash::make($value);
                        } else {
                            $errorMessage = '<div class="alert alert-danger">Passwords does not match !</div>';
                            break;
                        }
                    }
                }
            }
            if (isset($post)) {
                if (!empty($password = $_POST['current_password'])) {
                    if (Hash::check($password, auth()->user()->password) != false) {
                        unset($post['current_password']);
                        unset($post['password_confirm']);
                        $errorMessage = '<div class="alert alert-success">Updated !</div>';
                        DB::table('users')
                            ->where('id', auth()->user()->id)
                            ->update($post);
                    } else {
                        $errorMessage .= '<div class="alert alert-danger">Password seems incorrect !</div>';
                    }
                } else {
                    $errorMessage .= '<div class="alert alert-danger">Please enter your password to update your account !</div>';
                }
            }
        }
        return view('user.edit_profile', ['error' => $errorMessage]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $user->delete();
        return redirect('register');
    }
}
