<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command\Start;

use App\Model\Command\Response;
use App\Model\Command\Response\Factory as ResponseFactory;
use App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton;
use App\Service\Telegram\Model\Methods\Send\Message\Factory as SendMessageFactory;
use App\Model\Command\BaseAbstract;

class Start_v1 extends BaseAbstract
{
    /**
     * @var \App\Service\Telegram\Model\Methods\Send\Message\Factory
     */
    private $sendMessageFactory = null;

    // ########################################

    public function __construct(
        SendMessageFactory $sendMessageFactory,
        ResponseFactory $responseFactory
    ) {
        $this->sendMessageFactory = $sendMessageFactory;
        parent::__construct($responseFactory);
    }

    // ########################################

    public function process(): Response
    {
        $sendMessageModel = $this->sendMessageFactory->create(367843856, 'Hello');

        //todo get $inlineKeyboardButton by factory
        $inlineKeyboardButton = new InlineKeyboardButton('hi');
        $inlineKeyboardButton2 = new InlineKeyboardButton('hi2');
        $sendMessageModel->setReplyMarkup([$inlineKeyboardButton, $inlineKeyboardButton2]);

        $sendMessageModel->send();

        return $this->createSuccessResponse();
    }

    // ########################################
}
