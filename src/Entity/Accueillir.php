<?php

namespace App\Entity;

use App\Repository\AccueillirRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccueillirRepository::class)
 */
class Accueillir
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Annee;

    /**
     * @ORM\ManyToMany(targetEntity=Etudiant::class)
     */
    private $IdEtudiant;

    /**
     * @ORM\ManyToMany(targetEntity=Specialitee::class)
     */
    private $IdSpecialitee;

    /**
     * @ORM\ManyToMany(targetEntity=Classe::class)
     */
    private $IdClasse;

    /**
     * @ORM\ManyToMany(targetEntity=Entreprise::class, inversedBy="IdAcceillir")
     */
    private $IdEntreprise;

    public function __construct()
    {
        $this->IdEtudiant = new ArrayCollection();
        $this->IdSpecialitee = new ArrayCollection();
        $this->IdClasse = new ArrayCollection();
        $this->IdEntreprise = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->Annee;
    }

    public function setAnnee(\DateTimeInterface $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getIdEtudiant(): Collection
    {
        return $this->IdEtudiant;
    }

    public function addIdEtudiant(Etudiant $idEtudiant): self
    {
        if (!$this->IdEtudiant->contains($idEtudiant)) {
            $this->IdEtudiant[] = $idEtudiant;
        }

        return $this;
    }

    public function removeIdEtudiant(Etudiant $idEtudiant): self
    {
        $this->IdEtudiant->removeElement($idEtudiant);

        return $this;
    }

    /**
     * @return Collection<int, Specialitee>
     */
    public function getIdSpecialitee(): Collection
    {
        return $this->IdSpecialitee;
    }

    public function addIdSpecialitee(Specialitee $idSpecialitee): self
    {
        if (!$this->IdSpecialitee->contains($idSpecialitee)) {
            $this->IdSpecialitee[] = $idSpecialitee;
        }

        return $this;
    }

    public function removeIdSpecialitee(Specialitee $idSpecialitee): self
    {
        $this->IdSpecialitee->removeElement($idSpecialitee);

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getIdClasse(): Collection
    {
        return $this->IdClasse;
    }

    public function addIdClasse(Classe $idClasse): self
    {
        if (!$this->IdClasse->contains($idClasse)) {
            $this->IdClasse[] = $idClasse;
        }

        return $this;
    }

    public function removeIdClasse(Classe $idClasse): self
    {
        $this->IdClasse->removeElement($idClasse);

        return $this;
    }

    /**
     * @return Collection<int, Entreprise>
     */
    public function getIdEntreprise(): Collection
    {
        return $this->IdEntreprise;
    }

    public function addIdEntreprise(Entreprise $idEntreprise): self
    {
        if (!$this->IdEntreprise->contains($idEntreprise)) {
            $this->IdEntreprise[] = $idEntreprise;
        }

        return $this;
    }

    public function removeIdEntreprise(Entreprise $idEntreprise): self
    {
        $this->IdEntreprise->removeElement($idEntreprise);

        return $this;
    }
}
