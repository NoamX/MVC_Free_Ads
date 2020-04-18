<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $id = User::find(auth()->user()->id);
        $annonces = DB::table('users')
            ->join('annonces', 'users.id', '=', 'annonces.user_id')
            ->select('*', 'annonces.id as aId', 'annonces.updated_at as date')
            ->where('users.id', '=', Auth::user()->id)
            ->orderBy('annonces.updated_at', 'desc')
            ->paginate(10);
        return view('user.profile', compact('annonces'));
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
        $user = User::find(auth()->user()->id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $errorMessage = '';
        $user = User::find(auth()->user()->id);
        if (isset($request['submit'])) {
            if (!empty($request['current_password'])) {
                if (Hash::check($request['current_password'], $user->password)) {
                    foreach ($request->request as $key => $value) {
                        if (isset($value) && $key != '_token') {
                            $req[$key] = $value;
                            if (!empty($req['password']) && !empty($req['password_confirm'])) {
                                if ($req['password'] == $req['password_confirm']) {
                                    $req['password'] = Hash::make($value);
                                    unset($req['password_confirm']);
                                    unset($req['current_password']);
                                } else {
                                    $errorMessage = '<div class="alert alert-danger">Passwords does not match !</div>';
                                    break;
                                }
                            }
                        }
                    }
                    if (isset($req['email'])) {
                        foreach (User::all() as $value) {
                            if ($req['email'] == $value->email) {
                                $errorMessage = '<div class="alert alert-danger">Email already used !</div>';
                                return view('user.edit_profile', ['error' => $errorMessage]);
                            }
                        }
                    }
                    $user->update($req);
                    return redirect()->route('profile');
                } else {
                    $errorMessage = '<div class="alert alert-danger">Password seems incorrect !</div>';
                }
            } else {
                $errorMessage = '<div class="alert alert-danger">Please enter your password to update your account !</div>';
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
    public function destroy(Request $request, $id)
    {
        $errorMessage = '';
        if (isset($request['password'])) {
            if (Hash::check($request['password'], Auth::user()->password)) {
                $user = User::find(auth()->user()->id);
                $user->delete();
                return redirect('register');
            } else {
                $errorMessage = '<div class="alert alert-danger">Password seems incorrect !</div>';
                return view('user.delete', ['error' => $errorMessage]);
            }
        }
    }
}
