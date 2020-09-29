<?php

namespace App\Repository;

use App\Entity\Enseignants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Enseignants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enseignants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enseignants[]    findAll()
 * @method Enseignants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnseignantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enseignants::class);
    }

    // /**
    //  * @return Enseignants[] Returns an array of Enseignants objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Enseignants
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function ajouterUnNouveauEnseiganat($firstName,$lastName,$phone,$email,$contrat,$classe){
         
        $conn = $this->getEntityManager()->getConnection(); 

        $sql = "INSERT INTO `enseignants` ( `nom`, `prenom`, `telephone`, `email`, `contrat`, `classe`)
        VALUES ( ?,?,?,?,?,?);" ;
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1,$firstName);
                $stmt->bindValue(2,$lastName);
                $stmt->bindValue(3,$phone); 
                $stmt->bindValue(4,$email);
                $stmt->bindValue(5,$contrat);
                $stmt->bindValue(6,$classe);
                return $stmt->execute();
      }


      //function to UPDATE THE ENSEIGNANT  informationS
    public function ModisfierEnseignant($idEnseignant,$nom,$prenom,$email,$telephone,$contrat,$classe)
    {
        $conn = $this->getEntityManager()->getConnection(); 
    
        $sql=
       "UPDATE `enseignants` 
        SET `nom` = ?, `prenom` = ?, `telephone` = ?, `email` = ?, `contrat` = ?, `classe` = ?
        WHERE `enseignants`.`id` = ?;";

        $stmt = $conn->prepare($sql);
       
        $stmt->bindValue(1,$nom);
        $stmt->bindValue(2,$prenom);
        $stmt->bindValue(3,$telephone);
        $stmt->bindValue(4,$email);
        $stmt->bindValue(5,$contrat);
        $stmt->bindValue(6,$classe);
        $stmt->bindValue(7,$idEnseignant);
        return $stmt->execute();
    }


//function to retrieve the information of a Parent  with his id
 public function SupmrimerEnseignant($id)
 {
     $conn = $this->getEntityManager()->getConnection(); 
     $sql =

     "DELETE FROM  `enseignants` 
      WHERE  `id`=?" ;

     $stmt = $conn->prepare($sql);
     $stmt->bindValue(1,$id);
    return  $stmt->execute();
 } 



}
