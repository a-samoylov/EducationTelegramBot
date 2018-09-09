<?php

namespace App\Controller;

use App\Repository\TelegramUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Service\Telegram\Auth\Checker as TelegramAuthChecker;
use App\Entity\TelegramUser;
use App\Service\Telegram\Package\Message\Factory as PackageMessageFactory;

class TelegramController extends AbstractController
{
    // ########################################

    /**
     * @Route("/telegram", name="telegram_index")
     * @param \App\Service\Telegram\Auth\Checker            $telegramAuthChecker
     *
     * @param \App\Repository\TelegramUserRepository        $telegramUserRepository
     *
     * @param \App\Service\Telegram\Package\Message\Factory $packageMessageFactory
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        TelegramAuthChecker $telegramAuthChecker,
        TelegramUserRepository $telegramUserRepository,
        PackageMessageFactory $packageMessageFactory
    ) {
        // ########################################

        $request = Request::createFromGlobals();

        $telegramToken = $request->query->get('token');
        if (!$telegramAuthChecker->isValidToken($telegramToken)) {
            return $this->json([
                'message' => 'Invalid request',
            ]);
        }

        //create package
        $data = (array)json_decode($request->getContent(), true);//php://input
        $packageMessage = $packageMessageFactory->create($data);

        //todo process request
        $entityManager = $this->getDoctrine()->getManager();

        $user = $telegramUserRepository->findByChatId($packageMessage->getUserData()->getChatId());
        if (is_null($user)) {
            //todo in factory
            $user = new TelegramUser();

            $user->setChatId($packageMessage->getUserData()->getChatId());
            $user->setFirstName($packageMessage->getUserData()->getFirstName());
            $user->setLastName($packageMessage->getUserData()->getLastName());
            $user->setIsBot($packageMessage->getUserData()->isBot());
            $user->setLanguageCode($packageMessage->getUserData()->getLanguageCode());
        }


        dump($request);
        return $this->render('base.html.twig');

        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/IndexController.php',
        ]);*/

        // ########################################
    }

    // ########################################

    private function isExistUser($chatId)
    {

    }

    // ########################################
}
