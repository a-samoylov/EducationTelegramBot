<?php

namespace App\Repository;

use App\Entity\TelegramChat;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    // ########################################

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    // ########################################

    public function create(
        bool $isBot,
        TelegramChat $telegramChat,
        ?string $languageCode
    ) {
        $user = new User();

        $user->setIsBot($isBot);
        $user->setChat($telegramChat);
        $user->setLanguageCode($languageCode);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush($user);

        return $user;
    }

    // ########################################
}
