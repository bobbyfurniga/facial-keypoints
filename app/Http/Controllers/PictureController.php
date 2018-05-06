<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{

    public function index(Request $request)
    {

        return view('picture');
    }

    public function store(Request $request)
    {
        $data = [];
        dd($request->all());

        return view('picture', $data);
    }
}
