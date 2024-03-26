<?php

namespace App\Entity;

use App\Repository\LierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LierRepository::class)
 */
class Lier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Annee;

    /**
     * @ORM\ManyToMany(targetEntity=Profil::class)
     */
    private $IdProfil;

    /**
     * @ORM\ManyToMany(targetEntity=Salarie::class, inversedBy="IdLier")
     */
    private $IdSalarie;

    public function __construct()
    {
        $this->IdProfil = new ArrayCollection();
        $this->IdSalarie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->Annee;
    }

    public function setAnnee(?\DateTimeInterface $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    /**
     * @return Collection<int, Profil>
     */
    public function getIdProfil(): Collection
    {
        return $this->IdProfil;
    }

    public function addIdProfil(Profil $idProfil): self
    {
        if (!$this->IdProfil->contains($idProfil)) {
            $this->IdProfil[] = $idProfil;
        }

        return $this;
    }

    public function removeIdProfil(Profil $idProfil): self
    {
        $this->IdProfil->removeElement($idProfil);

        return $this;
    }

    /**
     * @return Collection<int, Salarie>
     */
    public function getIdSalarie(): Collection
    {
        return $this->IdSalarie;
    }

    public function addIdSalarie(Salarie $idSalarie): self
    {
        if (!$this->IdSalarie->contains($idSalarie)) {
            $this->IdSalarie[] = $idSalarie;
        }

        return $this;
    }

    public function removeIdSalarie(Salarie $idSalarie): self
    {
        $this->IdSalarie->removeElement($idSalarie);

        return $this;
    }
}
