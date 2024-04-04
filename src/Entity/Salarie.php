<?php

namespace App\Entity;

use App\Repository\SalarieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalarieRepository::class)
 */
class Salarie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=38, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=38, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\ManyToMany(targetEntity=Telephone::class)
     */
    private $IdTelephone;

    /**
     * @ORM\ManyToMany(targetEntity=Email::class)
     */
    private $IdEmail;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class)
     */
    private $IdPoste;

    /**
     * @ORM\ManyToMany(targetEntity=Lier::class, mappedBy="IdSalarie")
     */
    private $IdLier;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class)
     */
    private $IdEntreprise;

    public function __construct()
    {
        $this->IdTelephone = new ArrayCollection();
        $this->IdEmail = new ArrayCollection();
        $this->IdLier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * @return Collection<int, Telephone>
     */
    public function getIdTelephone(): Collection
    {
        return $this->IdTelephone;
    }

    public function addIdTelephone(Telephone $idTelephone): self
    {
        if (!$this->IdTelephone->contains($idTelephone)) {
            $this->IdTelephone[] = $idTelephone;
        }

        return $this;
    }

    public function removeIdTelephone(Telephone $idTelephone): self
    {
        $this->IdTelephone->removeElement($idTelephone);

        return $this;
    }

    /**
     * @return Collection<int, Email>
     */
    public function getIdEmail(): Collection
    {
        return $this->IdEmail;
    }

    public function addIdEmail(Email $idEmail): self
    {
        if (!$this->IdEmail->contains($idEmail)) {
            $this->IdEmail[] = $idEmail;
        }

        return $this;
    }

    public function removeIdEmail(Email $idEmail): self
    {
        $this->IdEmail->removeElement($idEmail);

        return $this;
    }

    public function getIdPoste(): ?Poste
    {
        return $this->IdPoste;
    }

    public function setIdPoste(?Poste $IdPoste): self
    {
        $this->IdPoste = $IdPoste;

        return $this;
    }

    /**
     * @return Collection<int, Email>
     */
    public function getIdLier(): Collection
    {
        return $this->IdLier;
    }

    public function addIdLier(Lier $IdLier): self
    {
        if (!$this->IdLier->contains($IdLier)) {
            $this->IdLier[] = $IdLier;
        }

        return $this;
    }

    public function removeIdLier(Lier $IdLier): self
    {
        $this->IdLier->removeElement($IdLier);

        return $this;
    }


    public function getIdEntreprise(): ?Entreprise
    {
        return $this->IdEntreprise;
    }

    public function setIdEntreprise(?Entreprise $IdEntreprise): self
    {
        $this->IdEntreprise = $IdEntreprise;

        return $this;
    }
}
