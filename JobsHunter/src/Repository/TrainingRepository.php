<?php

namespace App\Repository;

use App\Entity\Training;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Training|null find($id, $lockMode = null, $lockVersion = null)
 * @method Training|null findOneBy(array $criteria, array $orderBy = null)
 * @method Training[]    findAll()
 * @method Training[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainingRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 10;
    public const LAST_TRAININGS = 5;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Training::class);
    }

    public function findAllDESC()
    {

        return $this->findBy([], ['createdAt' => 'DESC']);
    }

    public function getLastTrainings()
    {
        $qb = $this->createQueryBuilder('T')
            ->setMaxResults(self::LAST_TRAININGS)
            ->orderBy('T.createdAt', 'DESC')
        ;

        $query = $qb->getQuery();
        return $query->execute();
    }

    public function searchAllDESC(Array $data)
    {
        $queryBuilder = $this->createQueryBuilder('t');

        if (!empty($data['keyword'])) {
            $queryBuilder = $queryBuilder
            ->where('t.title LIKE :keyword')
            ->setParameter('keyword', '%'.$data['keyword'].'%');
        }

        if (!empty($data['address'])) {
            $queryBuilder = $queryBuilder
            ->orWhere('t.address LIKE :address')
            ->setParameter('address', '%'.$data['address'].'%');
        }

        $queryBuilder = $queryBuilder->orderBy('t.createdAt', 'DESC');

        $resul = $queryBuilder->getQuery()->execute();

        return $resul;
    }

    // /**
    //  * @return Training[] Returns an array of Training objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Training
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
