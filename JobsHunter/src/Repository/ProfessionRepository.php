<?php

namespace App\Repository;

use App\Entity\Profession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Profession|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profession|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profession[]    findAll()
 * @method Profession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profession::class);
    }

    public function getNames()
    {
        return $this->createQueryBuilder("p")
        ->select("p.name")
        ->getQuery()
        ->getResult();

        // $entityManager = $this->getEntityManager();
        // $query = $entityManager->createQuery(
        //     'SELECT p.name
        //     FROM App\Entity\Profession p'
        // );
        // return $query->getResult();

        // return $this->createQueryBuilder('p')
        //     ->getQuery()->execute();
        // ;

        /*
            Select only professions that has jobs
        */
        // return $this->createQueryBuilder('p')
        //     ->innerJoin('p.jobs', 'x')
        //     ->getQuery()->execute();
        // ;

        // $entityManager = $this->getEntityManager();
        // $query = $entityManager->createQuery('
        //     SELECT p.name FROM App\Entity\Profession p
        // ');
        // return $query->getResult();

        // return $this->createQueryBuilder('p')
        //     ->getQuery()
        //     ->getResult()
        // ;
    }

    // /**
    //  * @return Profession[] Returns an array of Profession objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Profession
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
