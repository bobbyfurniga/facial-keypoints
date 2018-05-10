<?php
/**
 * Created by PhpStorm.
 * User: 123Bl
 * Date: 09-May-18
 * Time: 20:53
 */

Route::get('/test', function () {


    $python = 'C:\\Users\\123Bl\\AppData\\Local\\Programs\\Python\\Python36\\python.exe';
    $file = 'C:\\projects\\facial-keypoints\\resources\\pymodule\\modules.py';
    $image = 'C:\\projects\\facial-keypoints\\resources\\pymodule\\Images\\Paar.jpg';

    $cmd ="$python $file $image";
//    dd($cmd);

    $process = new \Symfony\Component\Process\Process($cmd);

    dd($process, $process->run(), $process->isSuccessful(), $process->getOutput());

    $command = escapeshellcmd($cmd);
    $output = shell_exec($command);
    dd($output, $command);

});