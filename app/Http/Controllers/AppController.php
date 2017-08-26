<?php

namespace App\Http\Controllers;

use App\Mix;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $mixes = Mix::inRandomOrder()->take(3)->get();

        return view('pages.app.home', [
            'mixes' => $mixes,
        ]);
    }
}
