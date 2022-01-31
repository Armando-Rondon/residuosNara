<?php

namespace App\Repository;

use App\Entity\Residuos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Residuos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Residuos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Residuos[]    findAll()
 * @method Residuos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResiduosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Residuos::class);
    }

    // /**
    //  * @return Residuos[] Returns an array of Residuos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Residuos
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
