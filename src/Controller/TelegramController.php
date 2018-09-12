<?php

namespace App\Controller;

use App\Service\Model\ValidateException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Telegram\Auth\Checker as TelegramAuthChecker;
use App\Service\Telegram\Command\Processor as TelegramCommandProcessor;
use App\Service\Telegram\Model\Type\Update\Resolver as UpdateResolver;

class TelegramController extends AbstractController
{
    // ########################################

    /**
     * @Route("/telegram", name="telegram_index")
     *
     * @param \App\Service\Telegram\Auth\Checker               $telegramAuthChecker
     * @param \App\Service\Telegram\Command\Processor          $telegramCommandProcessor
     * @param \App\Service\Telegram\Model\Type\Update\Resolver $updateResolver
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        TelegramAuthChecker $telegramAuthChecker,
        TelegramCommandProcessor $telegramCommandProcessor,
        UpdateResolver $updateResolver
    ) {
        $request = Request::createFromGlobals();

        if (!$telegramAuthChecker->isValidToken($request->query->get('token'))) {
            //todo event invalid telegram token
            //todo log

            return $this->json([
                'message' => 'Invalid request',
            ]);
        }

        try {
            $data = (array)json_decode($request->getContent(), true);//php://input
            $update = $updateResolver->resolve($data);
        } catch (ValidateException $exception) {
            //todo log
            return $this->render('base.html.twig');
        }

        $telegramCommandProcessor->process($update);

        //dump($request);
        return $this->render('base.html.twig');
    }

    // ########################################
}
