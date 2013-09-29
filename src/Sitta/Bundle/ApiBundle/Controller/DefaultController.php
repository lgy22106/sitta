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

    public function getAction(Request $request) {
        $ocr = new TesseractOCR();
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
