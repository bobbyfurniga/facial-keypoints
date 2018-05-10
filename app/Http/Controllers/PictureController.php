<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{

    public function index(Request $request)
    {
        $data = [];

        $effects = [
            'images/FX/batman.png',
            'images/FX/bigeyes.png',
            'images/FX/Darth_Vader.png',
            'images/FX/dog.png',
            'images/FX/glasses.png',
            'images/FX/glasses stache.png',
            'images/FX/mask.png',
            'images/FX/moustache0.png',
            'images/FX/pig.png',
            'images/FX/sunglasses.jpg',
            'images/FX/trump.png',
        ];

        $data['effects'] = $effects;

//        dd($data);
        return view('picture', $data);
    }

    public function store(Request $request)
    {
        $data = [];
        dd($request->all());

        return view('picture', $data);
    }
}
