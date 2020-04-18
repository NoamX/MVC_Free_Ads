<?php

namespace App\Http\Controllers;

use App\User;
use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
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
        $annonces = DB::table('annonces')
            ->join('users', 'users.id', '=', 'annonces.user_id')
            ->select('*', 'annonces.id as aId', 'annonces.updated_at as date')
            ->orderBy('annonces.updated_at', 'desc')
            ->paginate(10);
        return view('annonce.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::find(Auth::user()->id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->store('assets');
            $file->move('assets', $file->store('assets'));
        } else {
            $image = '';
        }
        Annonce::create([
            'title' => $request['title'],
            'price' => $request['price'],
            'image' => $image,
            'description' => nl2br($request['desc']),
            'user_id' => $users->id,
        ]);

        return redirect()->route('annonce.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        return view('annonce.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        $annonce->update([
            'title' => $request['title'],
            'price' => $request['price'],
            'description' => nl2br($request['desc']),
        ]);
        return redirect()->route('annonce.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Annonce::find($id)->delete();
        return redirect()->route('annonce.index');
    }
}
