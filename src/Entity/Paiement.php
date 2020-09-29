<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaiementRepository")
 */
class Paiement
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $montant_regle;

    /**
     * @ORM\Column(type="date")
     */
    private $date_paiement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParentsEleves", inversedBy="paiements")
     */
    private $parent_eleve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMontantRegle(): ?string
    {
        return $this->montant_regle;
    }

    public function setMontantRegle(string $montant_regle): self
    {
        $this->montant_regle = $montant_regle;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->date_paiement;
    }

    public function setDatePaiement(\DateTimeInterface $date_paiement): self
    {
        $this->date_paiement = $date_paiement;

        return $this;
    }

    public function getParentEleve(): ?ParentsEleves
    {
        return $this->parent_eleve;
    }

    public function setParentEleve(?ParentsEleves $parent_eleve): self
    {
        $this->parent_eleve = $parent_eleve;

        return $this;
    }
}
