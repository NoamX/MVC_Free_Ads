<?php

namespace App\Http\Controllers;

use App\User;
use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = DB::table('annonces')
            ->join('users', 'users.id', '=', 'annonces.user_id')
            ->select('*', 'annonces.id as aId')
            ->orderBy('annonces.created_at', 'desc')
            ->get();
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
        Annonce::create([
            'title' => $request['title'],
            'price' => $request['price'],
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
