<?php

namespace App\Repository;

use App\Entity\Kurse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kurse>
 *
 * @method Kurse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kurse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kurse[]    findAll()
 * @method Kurse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KurseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kurse::class);
    }

//    /**
//     * @return Kurse[] Returns an array of Kurse objects
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

//    public function findOneBySomeField($value): ?Kurse
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
