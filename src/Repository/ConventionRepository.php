<?php

namespace App\Repository;

use App\Entity\Convention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Convention|null find($id, $lockMode = null, $lockVersion = null)
 * @method Convention|null findOneBy(array $criteria, array $orderBy = null)
 * @method Convention[]    findAll()
 * @method Convention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConventionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Convention::class);
    }

    // /**
    //  * @return Convention[] Returns an array of Convention objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Convention
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
