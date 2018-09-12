<?php

namespace App\Controller;

use App\Repository\TelegramUserRepository;
use App\Service\Model\ValidateException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Telegram\Auth\Checker as TelegramAuthChecker;
use App\Service\Telegram\Package\Message\Factory as PackageMessageFactory;
use App\Service\Telegram\Command\Processor as TelegramCommandProcessor;
use App\Service\Telegram\Model\Type\Update\Resolver as UpdateResolver;

class TelegramController extends AbstractController
{
    // ########################################

    /**
     * @Route("/telegram", name="telegram_index")
     *
     * @param \App\Service\Telegram\Auth\Checker               $telegramAuthChecker
     * @param \App\Repository\TelegramUserRepository           $telegramUserRepository
     * @param \App\Service\Telegram\Package\Message\Factory    $packageMessageFactory
     * @param \App\Service\Telegram\Command\Processor          $telegramCommandProcessor
     * @param \App\Service\Telegram\Model\Type\Update\Resolver $updateResolver
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        TelegramAuthChecker $telegramAuthChecker,
        TelegramUserRepository $telegramUserRepository,
        PackageMessageFactory $packageMessageFactory,
        TelegramCommandProcessor $telegramCommandProcessor,
        UpdateResolver $updateResolver
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

        $data = (array)json_decode($request->getContent(), true);//php://input
        //$packageMessage = $packageMessageFactory->create($data);

        $update = $updateResolver->resolve($data);
        if (is_null($update)) {
            return $this->json([
                'message' => 'Error',
            ]);
        }

        /*$user = $telegramUserRepository->findByChatId($packageMessage->getUserData()->getChatId());
        if (is_null($user)) {
            $user = $telegramUserRepository->create(
                $packageMessage->getUserData()->getChatId(),
                $packageMessage->getUserData()->getFirstName(),
                $packageMessage->getUserData()->getLastName(),
                $packageMessage->getUserData()->isBot(),
                $packageMessage->getUserData()->getLanguageCode()
            );
        }*/

        //process command
        $telegramCommandProcessor->process($update);

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
