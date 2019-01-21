<?php

namespace App\Repository;

use App\Entity\Presentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Presentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Presentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Presentation[]    findAll()
 * @method Presentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresentationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Presentation::class);
    }


    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllEven()
    {
        return $this->createQuery(
            'SELECT p.* 
            FROM App\Entity\Presentation p
            WHERE p.id = (id%2 = 0');
    }


    /**
     *
     * @return Presentation|\Doctrine\ORM\QueryBuilder
     */
    public function findAllOdd()
    {
        return $this->createQuery(
            'SELECT p.* 
            FROM App\Entity\Presentation p
            WHERE p.id = (id%2 = 1)');

    }
    /*
    public function findOneBySomeField($value): ?Portfolio
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
