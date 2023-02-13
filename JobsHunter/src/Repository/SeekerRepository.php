<?php

namespace App\Repository;

use App\Entity\Seeker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Seeker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seeker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seeker[]    findAll()
 * @method Seeker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeekerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seeker::class);
    }

    // /**
    //  * @return Seeker[] Returns an array of Seeker objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Seeker
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
