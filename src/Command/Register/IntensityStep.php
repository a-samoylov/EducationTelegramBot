<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command\Register;

class IntensityStep
{
    // ########################################

    private function sendIntensity(\App\Entity\User $user)
    {
        $sendMessageModel = $this->sendMessageFactory->create($user->getChat()->getId(), 'Оберіть інтенсивність заннять');//TODO TEXT

        $replyMarkup = $this->inlineKeyboardMarkupFactory->create();
        $replyMarkup->addRowInlineKeyboard([
            $this->inlineKeyboardButtonFactory->create('Низька', json_encode(['small'])),//TODO TEXT
            $this->inlineKeyboardButtonFactory->create('Середня', json_encode(['medium'])),
            $this->inlineKeyboardButtonFactory->create('Висока', json_encode(['height'])),
        ]);
        $sendMessageModel->setReplyMarkup($replyMarkup);

        $response = $sendMessageModel->send();

        return $response !== false;
    }

    // ########################################
}
