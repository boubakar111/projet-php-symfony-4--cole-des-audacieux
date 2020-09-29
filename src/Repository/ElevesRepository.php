<?php

namespace App\Repository;

use App\Entity\Eleves;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Eleves|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eleves|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eleves[]    findAll()
 * @method Eleves[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElevesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eleves::class);
    }

    // /**
    //  * @return Eleves[] Returns an array of Eleves objects
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
    public function findOneBySomeField($value): ?Eleves
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
//function pour ajouter un eleve 
    public function ajouterUnNouveauParent($idParent,$sexe,$firstName,$lastName,$dateNaissance,$classe,$image,$ficheInscription){
         
        $conn = $this->getEntityManager()->getConnection(); 
        $sql = 
                "INSERT INTO `eleves` ( `nom`, `prenom`, `date_naissance`, `classe`, `image`, `fiche_information`, `sexe`, `id_parent_id`)
                VALUES (?,?,?,?,?, ?,?,? );";
                $stmt = $conn->prepare($sql);
              
                        $stmt->bindValue(1,$firstName);
                        $stmt->bindValue(2,$lastName);
                        $stmt->bindValue(4,$dateNaissance); 
                        $stmt->bindValue(3,$classe);
                        $stmt->bindValue(5,$image);
                        $stmt->bindValue(6,$ficheInscription);
                        $stmt->bindValue(7,$sexe);
                        $stmt->bindValue(8,$idParent);
                        
                return $stmt->execute();
    
    
      }

//fonction pour modifier les informations d'un eleve

      public function ModifierinformationEleve($ideleve,$gener,$nom,$prenom,$date,$classe,$image,$pdf,$ensignate){
         
        $conn = $this->getEntityManager()->getConnection(); 
         $sql =
               " UPDATE `eleves` 
                 SET `nom` = ?, `prenom` =?, `date_naissance` = ?, `classe` = ?, `image` = ?, `fiche_information` = ?, `sexe` = ?, `enseignat_id` = ?
                 WHERE `eleves`.`id` = ?;";
                $stmt = $conn->prepare($sql);
              
                        $stmt->bindValue(1,$nom);
                        $stmt->bindValue(2,$prenom);
                        $stmt->bindValue(3,$date); 
                        $stmt->bindValue(4,$classe);
                        $stmt->bindValue(5,$image);
                        $stmt->bindValue(6,$pdf);
                        $stmt->bindValue(7,$gener);
                        $stmt->bindValue(8,$ensignate);
                        $stmt->bindValue(9,$ideleve);
               
                return $stmt->execute();
      }

      //function to retrieve the information of eleve  with his id
        public function SupmrimerEnseignant($id)
        {
            $conn = $this->getEntityManager()->getConnection(); 
             $sql =
                  "DELETE FROM  `eleves` 
                   WHERE  `id`=?" ;

                        $stmt = $conn->prepare($sql);
                        $stmt->bindValue(1,$id);
                return  $stmt->execute();
        } 
            
     
}
