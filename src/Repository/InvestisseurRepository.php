<?php

namespace App\Repository;

use App\Entity\Investisseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Investisseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Investisseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Investisseur[]    findAll()
 * @method Investisseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvestisseurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Investisseur::class);
    }

    // /**
    //  * @return Investisseur[] Returns an array of Investisseur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Investisseur
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
