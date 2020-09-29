<?php

namespace App\Repository;

use App\Entity\ParentsEleves;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ParentsEleves|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentsEleves|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentsEleves[]    findAll()
 * @method ParentsEleves[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentsElevesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParentsEleves::class);
    }

    // /**
    //  * @return ParentsEleves[] Returns an array of ParentsEleves objects
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
    public function findOneBySomeField($value): ?ParentsEleves
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

public function ajouterUnNouveauParent($civilite,$firstName,$lastName,$phone,$email,$adresse){
         
    $conn = $this->getEntityManager()->getConnection(); 
    $sql = "INSERT INTO `parents_eleves` (`nom`, `prenom`, `telephone`, `adresse`, `civilite`,`email`) 
    VALUES (?, ?, ? ,?,? ,?);" ;
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$firstName);
            $stmt->bindValue(2,$lastName);
            $stmt->bindValue(3,$phone); 
            $stmt->bindValue(4,$adresse);
            $stmt->bindValue(5,$civilite);
            $stmt->bindValue(6,$email);
            return $stmt->execute();
  }

    //function to UPDATE a parent s information
    public function UpdateParentEleves($idParent,$nom,$prenom,$email,$telephone,$adresse,$civilite)
    {
        $conn = $this->getEntityManager()->getConnection(); 
    
        $sql=
       "UPDATE `parents_eleves` 
        SET `nom` = ?, `prenom` = ?, `telephone` = ?, `adresse` = ?, `civilite` = ?, `email` = ?
        WHERE `parents_eleves`.`id` = ?;";

        $stmt = $conn->prepare($sql);
       
        $stmt->bindValue(1,$nom);
        $stmt->bindValue(2,$prenom);
        $stmt->bindValue(3,$telephone);
        $stmt->bindValue(4,$adresse);
        $stmt->bindValue(5,$civilite);
        $stmt->bindValue(6,$email);
        $stmt->bindValue(7,$idParent);
        return $stmt->execute();
    }

 //function to retrieve the information of a Parent  with his id
 public function SupprimerParentEleve($id)
 {
     $conn = $this->getEntityManager()->getConnection(); 
     $sql =

     "DELETE FROM  `parents_eleves` 
      WHERE  `id`=?" ;

     $stmt = $conn->prepare($sql);
     $stmt->bindValue(1,$id);
    return  $stmt->execute();
 } 





}
