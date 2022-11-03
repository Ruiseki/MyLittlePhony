<?php

namespace App\Repository;

use App\Entity\CreateOfferEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreateOfferEntity>
 *
 * @method CreateOfferEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreateOfferEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreateOfferEntity[]    findAll()
 * @method CreateOfferEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreateOfferEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreateOfferEntity::class);
    }

    public function save(CreateOfferEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CreateOfferEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CreateOfferEntity[] Returns an array of CreateOfferEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CreateOfferEntity
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
