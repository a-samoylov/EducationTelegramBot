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


//    /**
//     * @return User[] Returns an array of User objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    // ########################################

    public function findByChatId($chatId): ?\App\Entity\TelegramUser
    {
        return $this->createQueryBuilder('telegramUser')
            ->andWhere('telegramUser.chatId = :chatId')
            ->setParameter('chatId', $chatId)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // ########################################

    public function create(
        int $chatId,
        string $firstName,
        string $lastName,
        bool $isBot,
        string $languageCode
    ) {
        $user = new TelegramUser();

        $user->setChatId($chatId);
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
