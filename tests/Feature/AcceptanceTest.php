<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AcceptanceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testHomeRoute()
    {
        $this->get('/')
            ->assertStatus(Response::HTTP_OK);
    }

    public function testEditPictureRoute()
    {
        $this->get('/picture')
            ->assertStatus(Response::HTTP_OK);
    }

//    public function testUploadPicture()
//    {
//        $imageName = 'Paar.png';
//        $picture = public_path('images/Paar.png');
//
//        $response = $this->withoutMiddleware(VerifyCsrfToken::class)
//            ->post('/picture', [
//                'upload_photo' => [
//                    'name' => $imageName,
//                    'type' => 'image/png',
//                    'tmp_name' => $picture,
//                ],
//            ])
//            ->assertStatus(Response::HTTP_OK);
//    }

    public function testModule()
    {
        $python = 'python';
        $file = 'C:\\projects\\facial-keypoints\\resources\\pymodule\\main.py';
        $image = 'C:\\projects\\facial-keypoints\\resources\\pymodule\\Images\\Paar.jpg';

        $cmd = "$python $file $image";

        $process = new \Symfony\Component\Process\Process($cmd);
        $process->setWorkingDirectory('C:\projects\facial-keypoints\resources\pymodule');

        try {
            $process->mustRun();
            $output = $process->getOutput();
            $output = str_replace('[ INFO:0] Initialize OpenCL runtime...', '', $output);
            $this->assertTrue(true, true);
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
