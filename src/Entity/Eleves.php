<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ElevesRepository")
 */
class Eleves
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;
    /**
     * la methode qui calcule lage de lenfant en question   et renvoi  le resultat au twig
     */

    public function getAge()
    {
        //function qui calcule l'age de leleve 
        $now = new \DateTime('now');
        $age = $this->getDateNaissance();
        $difference = $now->diff($age);

        return $difference->format('%y Ans');
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fiche_information;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParentsEleves", inversedBy="eleves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_parent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enseignants", inversedBy="eleves")
     */
    private $enseignat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getFicheInformation(): ?string
    {
        return $this->fiche_information;
    }

    public function setFicheInformation(?string $fiche_information): self
    {
        $this->fiche_information = $fiche_information;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getIdParent(): ?ParentsEleves
    {
        return $this->id_parent;
    }

    public function setIdParent(?ParentsEleves $id_parent): self
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    public function getEnseignat(): ?Enseignants
    {
        return $this->enseignat;
    }

    public function setEnseignat(?Enseignants $enseignat): self
    {
        $this->enseignat = $enseignat;

        return $this;
    }
}
