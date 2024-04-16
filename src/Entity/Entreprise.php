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
     * @ORM\ManyToMany(targetEntity=Accueillir::class, mappedBy="IdEntreprise")
     */
    private $IdAccueillir;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $CodePostal;

    /**
     * @ORM\OneToMany(targetEntity=Preferer::class, mappedBy="IdEntreprise")
     */
    private $preferers;

    /**
     * @ORM\OneToMany(targetEntity=Accueillir::class, mappedBy="IdEntreprise")
     */
    private $accueillirs;

    public function __construct()
    {
        $this->preferers = new ArrayCollection();
        $this->accueillirs = new ArrayCollection();
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


    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(?string $CodePostal): self
    {
        $this->CodePostal = $CodePostal;

        return $this;
    }

    /**
     * @return Collection<int, Preferer>
     */
    public function getPreferers(): Collection
    {
        return $this->preferers;
    }

    public function addPreferer(Preferer $preferer): self
    {
        if (!$this->preferers->contains($preferer)) {
            $this->preferers[] = $preferer;
            $preferer->setIdEntreprise($this);
        }

        return $this;
    }

    public function removePreferer(Preferer $preferer): self
    {
        if ($this->preferers->removeElement($preferer)) {
            // set the owning side to null (unless already changed)
            if ($preferer->getIdEntreprise() === $this) {
                $preferer->setIdEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Accueillir>
     */
    public function getAccueillirs(): Collection
    {
        return $this->accueillirs;
    }

    public function addAccueillir(Accueillir $accueillir): self
    {
        if (!$this->accueillirs->contains($accueillir)) {
            $this->accueillirs[] = $accueillir;
            $accueillir->setIdEntreprise($this);
        }

        return $this;
    }

    public function removeAccueillir(Accueillir $accueillir): self
    {
        if ($this->accueillirs->removeElement($accueillir)) {
            // set the owning side to null (unless already changed)
            if ($accueillir->getIdEntreprise() === $this) {
                $accueillir->setIdEntreprise(null);
            }
        }

        return $this;
    }
}
