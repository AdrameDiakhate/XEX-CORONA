<?php

namespace App\Repository;

use App\Entity\VerifieSuspect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VerifieSuspect|null find($id, $lockMode = null, $lockVersion = null)
 * @method VerifieSuspect|null findOneBy(array $criteria, array $orderBy = null)
 * @method VerifieSuspect[]    findAll()
 * @method VerifieSuspect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerifieSuspectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VerifieSuspect::class);
    }

    // /**
    //  * @return VerifieSuspect[] Returns an array of VerifieSuspect objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VerifieSuspect
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
