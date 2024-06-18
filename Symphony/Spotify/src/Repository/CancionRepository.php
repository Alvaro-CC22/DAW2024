<?php

namespace App\Repository;

use App\Entity\Cancion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cancion>
 */
class CancionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cancion::class);
    }
    public function findByPartialName($nombre)
    {
        return $this->createQueryBuilder('c')
            ->where('c.nombre LIKE :nombre')
            ->setParameter('nombre', '%' . $nombre . '%')
            ->getQuery()
            ->getResult();
    }

    public function findByPartialArtist($artista)
    {
        return $this->createQueryBuilder('c')
            ->where('c.artista LIKE :artista')
            ->setParameter('artista', '%' . $artista . '%')
            ->getQuery()
            ->getResult();
    }

    public function findByPartialAlbum($album)
    {
        return $this->createQueryBuilder('c')
            ->where('c.album LIKE :album')
            ->setParameter('album', '%' . $album . '%')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Cancion[] Returns an array of Cancion objects
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

//    public function findOneBySomeField($value): ?Cancion
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
