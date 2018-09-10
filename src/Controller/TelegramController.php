<?php

namespace App\Controller;

use App\Repository\TelegramUserRepository;
use App\Service\Model\ValidateException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Telegram\Auth\Checker as TelegramAuthChecker;
use App\Service\Telegram\Package\Message\Factory as PackageMessageFactory;
use App\Service\Telegram\Command\Loader as TelegramCommandLoader;

class TelegramController extends AbstractController
{
    // ########################################

    /**
     * @Route("/telegram", name="telegram_index")
     *
     * @param \App\Service\Telegram\Auth\Checker            $telegramAuthChecker
     * @param \App\Repository\TelegramUserRepository        $telegramUserRepository
     * @param \App\Service\Telegram\Package\Message\Factory $packageMessageFactory
     * @param \App\Service\Telegram\Command\Loader          $telegramCommandLoader
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        TelegramAuthChecker    $telegramAuthChecker,
        TelegramUserRepository $telegramUserRepository,
        PackageMessageFactory  $packageMessageFactory,
        TelegramCommandLoader  $telegramCommandLoader
    ) {
        // ########################################

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
            $packageMessage = $packageMessageFactory->create($data);
        } catch (ValidateException $validateException) {
            //todo log
            $message   = $validateException->getMessage();
            $inputData = $validateException->getInputData();

            return $this->json([
                'message' => 'Error',
            ]);
        }

        $user = $telegramUserRepository->findByChatId($packageMessage->getUserData()->getChatId());
        if (is_null($user)) {
            $user = $telegramUserRepository->create(
                $packageMessage->getUserData()->getChatId(),
                $packageMessage->getUserData()->getFirstName(),
                $packageMessage->getUserData()->getLastName(),
                $packageMessage->getUserData()->isBot(),
                $packageMessage->getUserData()->getLanguageCode()
            );
        }

        //process command
        $telegramCommandLoader->process(
            $user,
            $packageMessage->getText(),
            $packageMessage->getCommandType(),
            $packageMessage->getDateTime()
        );

        //dump($request);
        return $this->render('base.html.twig');

        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/IndexController.php',
        ]);*/

        // ########################################
    }

    // ########################################
}
