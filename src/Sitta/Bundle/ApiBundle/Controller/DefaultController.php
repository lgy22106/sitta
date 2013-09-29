<?php

namespace Sitta\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use TesseractOCR;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SittaApiBundle:Default:index.html.twig', array('name' => $name));
    }

    public function getAction() {
        $ocr = new TesseractOCR();

        $text = $ocr->recognize('/tmp/3.png');
        //$configFile = $ocr->generateConfigFile(func_get_args());
        
        //$output = $ocr->executeTesseract('/tmp/1.tif',$configFile);
        //$text = trim(file_get_contents($output));


        //$text = 'hi';
        $response = new Response(json_encode(array('value' => $text)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
