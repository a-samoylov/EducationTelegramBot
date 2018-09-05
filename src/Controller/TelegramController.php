<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Telegram\Auth\Checker as TelegramAuthChecker;

class TelegramController extends AbstractController
{
    /**
     * @Route("/telegram", name="index")
     * @param \App\Service\Telegram\Auth\Checker $telegramAuthChecker
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TelegramAuthChecker $telegramAuthChecker)
    {
        // ########################################

        $request = Request::createFromGlobals();

        //todo auth
        $request->query->get('token');

        //todo create package
        $data = (array)json_decode($request->getContent(), true);//php://input

        //todo process request


        dump($request);
        return $this->render('base.html.twig');

        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/IndexController.php',
        ]);*/

        // ########################################
    }
}
