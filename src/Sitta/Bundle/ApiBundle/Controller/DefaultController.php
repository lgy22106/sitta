<?php

namespace Sitta\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TesseractOCR;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SittaApiBundle:Default:index.html.twig', array('name' => $name));
    }

    public function getAction() {

        $filepath = __DIR__.'/../../../../web/hello.png';
        $ocr = new TesseractOCR();

        $text = $ocr->recognize($filepath);

        



        $text = 'hi';
        $response = new Response(json_encode(array('value' => $text)));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
