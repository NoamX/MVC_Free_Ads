<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showIndex()
    {
        return view('index');
    }

    public function showTest()
    {
        return 'Rien';
    }
}
