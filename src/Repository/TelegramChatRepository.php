<?php

namespace App\Repository;

use App\Entity\TelegramChat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TelegramChat|null find($id, $lockMode = null, $lockVersion = null)
 * @method TelegramChat|null findOneBy(array $criteria, array $orderBy = null)
 * @method TelegramChat[]    findAll()
 * @method TelegramChat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelegramChatRepository extends ServiceEntityRepository
{
    // ########################################

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TelegramChat::class);
    }

    // ########################################

    /**
     * @param int $chatId
     *
     * @return \App\Entity\User|null Returns an array of TelegramChat objects
     */
    public function findByChatId(int $chatId): ?\App\Entity\User
    {
        return $this->createQueryBuilder('telegramChat')
                    ->andWhere('telegramChat.chatId = :chatId')
                    ->setParameter('chatId', $chatId)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    // ########################################

    public function create(
        int $chatId,
        ?string $type,
        ?string $username,
        ?string $firstName,
        ?string $lastName
    ) {
        $char = new TelegramChat();

        $char->setChatId($chatId);
        $char->setUsername($username);
        $char->setFirstName($firstName);
        $char->setLastName($lastName);

        switch ($type) {
            case \App\Entity\TelegramChat::TYPE_PRIVATE:
                $char->setTypePrivate();
                break;
            case \App\Entity\TelegramChat::TYPE_GROUP:
                $char->setTypeGroup();
                break;
            case \App\Entity\TelegramChat::TYPE_SUPERGROUP:
                $char->setTypeSupergroup();
                break;
            case \App\Entity\TelegramChat::TYPE_CHANNEL:
                $char->setTypeChannel();
                break;
        }

        $this->getEntityManager()->persist($char);
        $this->getEntityManager()->flush($char);

        return $char;
    }

    // ########################################
}
