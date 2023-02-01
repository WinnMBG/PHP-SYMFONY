<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ProductRepository;

/**
 * @extends ServiceEntityRepository<Categorie>
 *
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

    public function save(Categorie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Categorie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Categorie[] Returns an array of Categorie objects
    */
   public function getCate(): array
   {
        return $this->createQueryBuilder('c')
        ->select('c.name, c.slug, COUNT(p.id) as nbProduct')
        ->Join(Product::class, 'p')
        ->where('c.id=p.category')
        ->groupBy('c.id')
        ->getQuery()
        ->getResult()
        ;
   }

   public function getProductByCate(string $str): array
   {
        return $this->createQueryBuilder('c')
        ->select('p')
        ->Join(Product::class, 'p')
        ->where('c.id=p.category')
        ->andWhere('c.slug = :slug')
        ->setParameter('slug', $str)
        ->getQuery()
        ->getResult()
        ;
   }

//    public function findOneBySomeField($value): ?Categorie
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
