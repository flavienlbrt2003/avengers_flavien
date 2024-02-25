<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Livre>
 *
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }

    public function NbLivres(): array{
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT COUNT(l)
            FROM App\Entity\Livre l');
        return $query->getResult();
    }

    public function LivresPremiereLettre($lettre): array{
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT l
            FROM App\Entity\Livre l
            WHERE (l.titre LIKE :lettre)')
            ->setParameter('lettre', $lettre.'%');
        return $query->getResult();
    }

    public function LivresAuteur($auteurId): array{
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT l
            FROM App\Entity\Livre l
            WHERE (l.auteur_id = :auteurid)')
            ->setParameter('auteurid', $auteurId);
        return $query->getResult();
    }

//    /**
//     * @return Livre[] Returns an array of Livre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Livre
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
