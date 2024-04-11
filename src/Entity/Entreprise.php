<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $RS;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pays;

    /**
     * @ORM\Column(type="string", length=255 ,nullable="true")
     */
    private $Activitee;

    /**
     * @ORM\ManyToMany(targetEntity=Preferer::class, mappedBy="IdEntreprise")
     */
    private $IdPreferer;

    /**
     * @ORM\ManyToMany(targetEntity=Accueillir::class, mappedBy="IdEntreprise")
     */
    private $IdAccueillir;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $CodePostal;

    public function __construct()
    {
        $this->IdPreferer = new ArrayCollection();
        $this->IdAccueillir = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRS(): ?string
    {
        return $this->RS;
    }

    public function setRS(string $RS): self
    {
        $this->RS = $RS;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getActivitee(): ?string
    {
        return $this->Activitee;
    }

    public function setActivitee(string $Activitee): self
    {
        $this->Activitee = $Activitee;

        return $this;
    }

    /**
     * @return Collection<int, Preferer>
     */
    public function getIdPreferer(): Collection
    {
        return $this->IdPreferer;
    }

    public function addIdPreferer(Preferer $idPreferer): self
    {
        if (!$this->IdPreferer->contains($idPreferer)) {
            $this->IdPreferer[] = $idPreferer;
            $idPreferer->addIdEntreprise($this);
        }

        return $this;
    }

    public function removeIdPreferer(Preferer $idPreferer): self
    {
        if ($this->IdPreferer->removeElement($idPreferer)) {
            $idPreferer->removeIdEntreprise($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Accueillir>
     */
    public function getIdAccueillir(): Collection
    {
        return $this->IdAccueillir;
    }

    // public function addIdAcceillir(Accueillir $idAccueillir): self
    // {
    //     if (!$this->IdAccueillir->contains($idAccueillir)) {
    //         $this->IdAccueillir[] = $idAccueillir;
    //         $idAccueillir->addIdEntreprise($this);
    //     }

    //     return $this;
    // }

    // public function removeIdAcceillir(Accueillir $idAccueillir): self
    // {
    //     if ($this->IdAccueillir->removeElement($idAccueillir)) {
    //         $idAccueillir->removeIdEntreprise($this);
    //     }

    //     return $this;
    // }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(?string $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }
}
