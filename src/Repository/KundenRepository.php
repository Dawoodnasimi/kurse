<?php

namespace App\Repository;

use App\Entity\Kunden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kunden>
 *
 * @method Kunden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kunden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kunden[]    findAll()
 * @method Kunden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KundenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kunden::class);
    }

//    /**
//     * @return Kunden[] Returns an array of Kunden objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Kunden
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
