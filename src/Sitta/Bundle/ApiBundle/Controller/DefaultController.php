<?php

namespace Sitta\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use TesseractOCR;

class DefaultController extends Controller
{
    $ocr = new TesseractOCR();

    public function indexAction($name)
    {
        return $this->render('SittaApiBundle:Default:index.html.twig', array('name' => $name));
    }

<<<<<<< HEAD
    public function getAction() {
        $ocr = new TesseractOCR();

        $text = $ocr->recognize('/tmp/3.png');
        //$configFile = $ocr->generateConfigFile(func_get_args());
=======
    public function getAction(Request $request) {
>>>>>>> ea6758efd75af8a994cf5175c36d1461fd79fb28
        
        if(!empty($request)) {
            $requestJson = json_decode($request);
            $tmpImage = '/tmp/'. rand() . 'jpg'
            copy($request->get('url'), $tmpImage);
            $txt = $ocr->recognize($tmpImage);
            $response = new Response(json_encode(array('value' => $txt)));
        }
        else {
            $response = new Response(json_encode(array('err' => "Empty Request!")));
        }
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }

    public function testAction() {
        return $this->render('SittaApiBundle:Default:test.html.twig');

    }
}
