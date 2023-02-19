<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 5;
    public const LAST_JOBS = 5;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function findAllDESC()
    {

        return $this->findBy([], ['createdAt' => 'DESC']);
    }

    public function getLastJobs()
    {
        $qb = $this->createQueryBuilder('j')
            ->setMaxResults(self::LAST_JOBS)
            ->orderBy('j.createdAt', 'DESC')
        ;

        $query = $qb->getQuery();
        return $query->execute();
    }

    public function searchAllDESC(Array $data)
    {
        $queryBuilder = $this->createQueryBuilder('j');

        if (!empty($data['keyword'])) {
            $queryBuilder = $queryBuilder
            ->where('j.title LIKE :keyword')
            ->setParameter('keyword', '%'.$data['keyword'].'%');
        }

        if (!empty($data['address'])) {
            $queryBuilder = $queryBuilder
            ->orWhere('j.address LIKE :address')
            ->setParameter('address', '%'.$data['address'].'%');
        }

        $queryBuilder = $queryBuilder->orderBy('j.createdAt', 'DESC');

        $resul = $queryBuilder->getQuery()->execute();

        return $resul;
    }

    // public function getOffers(Company $company)
    // {
    //     return $this->findBy([], ['name' => $company->getName()]);
    // }

    // /**
    //  * @return Job[] Returns an array of Job objects
    //  */
    // public function findByTitle($value)
    // {
    //     return $this->createQueryBuilder('j')
    //         ->andWhere('j.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('j.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    /*
    public function findOneBySomeField($value): ?Job
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
