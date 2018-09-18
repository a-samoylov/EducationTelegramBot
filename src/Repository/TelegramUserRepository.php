<?php

namespace App\Repository;

use App\Entity\TelegramUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TelegramUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method TelegramUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method TelegramUser[]    findAll()
 * @method TelegramUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelegramUserRepository extends ServiceEntityRepository
{
    // ########################################

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TelegramUser::class);
    }

    // ########################################

    public function create(
        string $firstName,
        string $lastName,
        bool $isBot,
        string $languageCode
    ) {
        $user = new TelegramUser();

        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setIsBot($isBot);
        $user->setLanguageCode($languageCode);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush($user);

        return $user;
    }

    // ########################################
}
