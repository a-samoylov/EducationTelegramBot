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

    public function create(
        int $chatId,
        string $type,
        ?string $username,
        ?string $firstName,
        ?string $lastName
    ) {
        $char = new TelegramChat();

        $char->setId($chatId);

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

        !is_null($username)  && $char->setUsername($username);
        !is_null($firstName) && $char->setFirstName($firstName);
        !is_null($lastName)  && $char->setLastName($lastName);

        $this->getEntityManager()->persist($char);
        $this->getEntityManager()->flush($char);

        return $char;
    }

    // ########################################
}
