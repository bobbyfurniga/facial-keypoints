<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

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


        if ($request->hasFile('upload_photo')) {

            $path = $request->file('upload_photo')->store(
                'uploads', 'public_uploads'
            );

            $data['image'] = $path;
        }


        return view('picture', $data);
    }
}
