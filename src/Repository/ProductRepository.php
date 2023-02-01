<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function save(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Product $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Product[] Returns an array of Product objects
    */
   public function getRandomValues(): array
   {
       return $this->createQueryBuilder('pro')
           ->orderBy('RAND()')
           ->setMaxResults(3)
           ->getQuery()
           ->getResult()
       ;
   }

   public function getTotalProducts(): int
   {
        return $this->createQueryBuilder('pro')
            ->select('count(pro.id)')
            ->getQuery()
            ->getSingleScalarResult();
        ;
   }

   public function getProductsByPage(int $nb): array
   {
        if( $nb === 1) {
            return $this->createQueryBuilder('pro')
                ->orderBy('pro.id', 'asc')
                ->setFirstResult(0)
                ->setMaxResults(4)
                ->getQuery()
                ->getResult()
            ;
        } else {
            return $this->createQueryBuilder('pro')
                ->orderBy('pro.id', 'asc')
                ->setFirstResult(($nb - 1) * 4)
                ->setMaxResults(4)
                ->getQuery()
                ->getResult()
            ;
        }
   }
}
?>