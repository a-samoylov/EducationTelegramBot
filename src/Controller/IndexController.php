<?php

namespace App\Controller;

use ReflectionClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $a = new \App\Service\Telegram\Model\Type\User(
            1,
            true,
            'ads',
            '',
            '',
            null
        );


        /*$reflection = new ReflectionClass(\App\Service\Telegram\Model\Type\User::class);
        $method = $reflection->getMethod('get');
        $a = $method->getDocComment();*/

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
