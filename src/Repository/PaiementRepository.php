<?php

namespace App\Repository;

use App\Entity\Paiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Paiement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paiement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paiement[]    findAll()
 * @method Paiement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Paiement::class);
    }

    // /**
    //  * @return Paiement[] Returns an array of Paiement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Paiement
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function ajouterUnPaiement($typeP,$dateP,$montantP,$idParent){

        $conn = $this->getEntityManager()->getConnection(); 
        $sql = "INSERT INTO `paiement` ( `type`, `montant_regle`, `date_paiement`, `parent_eleve_id`)
         VALUES (?,?,?,?);";
               
               $stmt = $conn->prepare($sql);
              
                $stmt->bindValue(1,$typeP);
                $stmt->bindValue(2,$montantP);
                $stmt->bindValue(3,$dateP); 
                $stmt->bindValue(4,$idParent);
            
                return $stmt->execute();
      }
}
