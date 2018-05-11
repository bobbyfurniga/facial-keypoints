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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
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

        $python = 'python';
        $file = 'C:\Projects\facial-keypoints\resources\pymodule\main.py';
//        $image = 'C:\\projects\\facial-keypoints\\resources\\pymodule\\Images\\Paar.jpg';
        $image = public_path($path);

        $cmd = "$python $file $image";

        $process = new \Symfony\Component\Process\Process($cmd);
        $process->setWorkingDirectory('C:\Projects\facial-keypoints\resources\pymodule');

        try {
            $process->mustRun();
            $output = $process->getOutput();
            $output = str_replace('[ INFO:0] Initialize OpenCL runtime...', '', $output);
        } catch (\Exception $e) {
            throw $e;
        }

        $data['points'] = $output;

        return view('picture', $data);
    }
}
