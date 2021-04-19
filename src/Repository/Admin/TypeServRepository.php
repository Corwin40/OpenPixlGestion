<?php

namespace App\Repository\Admin;

use App\Entity\Admin\TypeServ;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeServ|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeServ|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeServ[]    findAll()
 * @method TypeServ[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeServRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeServ::class);
    }

    // /**
    //  * @return TypeServ[] Returns an array of TypeServ objects
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
    public function findOneBySomeField($value): ?TypeServ
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
