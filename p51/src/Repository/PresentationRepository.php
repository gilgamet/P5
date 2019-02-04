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

    public function findOddId():Query
    {
        $query = $this->FindId()->getQuery();
        if ($query) {
            $query = $query
                ->where('prez.id %2 = 1');

        }
        return $query->getQuery();
    }

    public function findEvenId():Query
    {
        $query = $this->FindId()->getQuery();
        if ($query) {
            $query = $query
                ->where('prez.id %2 = 0');

        }
        return $query->getQuery();
    }


    private function FindId() :QueryBuilder
    {
        return $this->createQueryBuilder('prez')
            ->where('prez.id = :id');
    }
    */
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
