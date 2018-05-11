<?php
/**
 * Created by PhpStorm.
 * User: 123Bl
 * Date: 09-May-18
 * Time: 20:53
 */

Route::get('/test', function () {


//    $python = 'C:\\Users\\123Bl\\AppData\\Local\\Programs\\Python\\Python36\\python.exe';
    $python = 'python';
    $file = 'C:\\projects\\facial-keypoints\\resources\\pymodule\\main.py';
    $image = 'C:\\projects\\facial-keypoints\\resources\\pymodule\\Images\\Paar.jpg';

    $cmd = "$python $file $image";
//    dd($cmd);

    $process = new \Symfony\Component\Process\Process($cmd);
    $process->setWorkingDirectory('C:\projects\facial-keypoints\resources\pymodule');

    try {
        $process->mustRun();
        $output = $process->getOutput();
        $output = str_replace('[ INFO:0] Initialize OpenCL runtime...', '', $output);
        echo $output;
    } catch (Exception $e) {
        throw $e;
    }


//    dd($process, $process->run(), $process->isSuccessful(), $process->getOutput());


});