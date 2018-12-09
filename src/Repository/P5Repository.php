<?php

namespace App\Repository;

use App\Entity\P5;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method P5|null find($id, $lockMode = null, $lockVersion = null)
 * @method P5|null findOneBy(array $criteria, array $orderBy = null)
 * @method P5[]    findAll()
 * @method P5[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class P5Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, P5::class);
    }

    // /**
    //  * @return P5[] Returns an array of P5 objects
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
    public function findOneBySomeField($value): ?P5
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
