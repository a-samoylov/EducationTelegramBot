<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Psr\Log\LoggerInterface;

use App\Model\Exception\Validate as ValidateException;
use App\Telegram\Auth\Checker as TelegramAuthChecker;
use App\Service\Command\Processor as TelegramCommandProcessor;
use App\Telegram\Model\Type\Update\Resolver as UpdateResolver;

class TelegramController extends AbstractController
{
    // ########################################

    /**
     * @Route("/telegram", name="telegram_index")
     *
     * @param \App\Telegram\Auth\Checker               $telegramAuthChecker
     * @param \App\Service\Command\Processor           $telegramCommandProcessor
     * @param \App\Telegram\Model\Type\Update\Resolver $updateResolver
     * @param \Psr\Log\LoggerInterface                 $logger
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        TelegramAuthChecker $telegramAuthChecker,
        TelegramCommandProcessor $telegramCommandProcessor,
        UpdateResolver $updateResolver,
        LoggerInterface $logger
    ) {
        $request  = Request::createFromGlobals();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        if (!$telegramAuthChecker->isValidToken($request->query->get('token'))) {
            $logger->alert('Invalid access token.', [
                '_SERVER'     => $_SERVER,
                '_POST'       => $_POST,
                'php://input' => $request->getContent(),
            ]);

            $response->setContent(json_encode(['message' => 'Invalid access data.']));
            $response->setStatusCode(Response::HTTP_FORBIDDEN);

            return $response;
        }

        try {
            $data = (array)json_decode($request->getContent(), true);//php://input
            $update = $updateResolver->resolve($data);
            if (is_null($update)) {
                $logger->alert('Update not recognize.', [
                    'data' => $data
                ]);
                $response->setContent(json_encode(['message' => 'Error input data.']));
                $response->setStatusCode(Response::HTTP_FORBIDDEN);

                return $response;
            }

        } catch (ValidateException $validateException) {
            $logger->alert('Error input data.', [
                'input_data' => $validateException->getInputData(),
                'field_name' => $validateException->getFieldName(),
                'class_name' => $validateException->getClassName(),
                'message'    => $validateException->getMessage(),
                'code'       => $validateException->getCode(),
            ]);

            $response->setContent(json_encode(['message' => 'Error input data.']));
            $response->setStatusCode(Response::HTTP_FORBIDDEN);

            return $response;
        }

        /** @var \App\Model\Command\Response $commandResponse */
        $commandResponse = $telegramCommandProcessor->process($update);
        if (!$commandResponse->isSuccess()) {
            $response->setContent(json_encode(['message' => 'Server error.']));
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);

            return $response;
        }

        $response->setContent(json_encode(['message' => 'Success.']));
        $response->setStatusCode(Response::HTTP_OK);

        //dump($request);
        return $response;
    }

    // ########################################
}
