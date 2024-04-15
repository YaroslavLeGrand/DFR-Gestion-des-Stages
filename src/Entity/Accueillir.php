<?php

namespace App\Entity;

use App\Repository\AccueillirRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass=AccueillirRepository::class)
 */
class Accueillir
{

    /**
     * @ORM\Column(type="datetime",unique=true)
     */
    private $Annee;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Classe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdClasse;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Specialitee::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSpecialitee;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Etudiant::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdEtudiant;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="accueillir")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdEntreprise;

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->Annee;
    }

    public function setAnnee(\DateTimeInterface $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getIdClasse(): ?Classe
    {
        return $this->IdClasse;
    }

    public function getIdSpecialitee(): ?Specialitee
    {
        return $this->IdSpecialitee;
    }

    public function setIdEntreprise(?Entreprise $IdEntreprise): self
    {
        $this->IdEntreprise = $IdEntreprise;

        return $this;
    }

    public function setIdEtudiant(?Etudiant $IdEtudiant): self
    {
       
        $this->IdEtudiant = $IdEtudiant;

        return $this;
    }

    public function setIdClasse(?Classe $IdClasse): self
    {
        $this->IdClasse = $IdClasse;

        return $this;
    }

    public function setIdSpecialitee(?Specialitee $IdSpecialitee): self
    {
        $this->IdSpecialitee = $IdSpecialitee;
        
        return $this;
    }

    public function getIdEtudiant(): ?Etudiant
    {
        return $this->IdEtudiant;
    }

    public function getIdEntreprise(): ?Entreprise
    {
        return $this->IdEntreprise;
    }

}
