<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AboutController extends Controller
{
    public function index()
    {

        $people = ['Samuel', 'Renny', 'Joy'];


//    return view('public.about', compact('people')); //resources/views/public/about.blade.php
//    alternative
        return view('public.about')->with([

            'people' => $people

        ]);
    }



}
