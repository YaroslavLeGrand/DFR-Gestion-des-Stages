<?php

namespace App\Entity;

use App\Repository\LierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LierRepository::class)
 */
class Lier
{

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Annee;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Profil::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdProfil;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Salarie::class, inversedBy="idRole")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSalarie;

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->Annee;
    }

    public function setAnnee(?\DateTimeInterface $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getIdProfil(): ?Profil
    {
        return $this->IdProfil;
    }

    public function setId(?Profil $IdProfil,?Salarie $IdSalarie): self
    {
        $this->IdProfil = $IdProfil;
        $this->IdSalarie = $IdSalarie;
        return $this;
    }

    public function setIdProfil(?Profil $IdProfil): self
    {
        $this->IdProfil = $IdProfil;

        return $this;
    }

    public function setIdSalarie(?Salarie $IdSalarie): self
    {
        $this->IdSalarie = $IdSalarie;
        
        return $this;
    }

    public function getIdSalarie(): ?Salarie
    {
        return $this->IdSalarie;
    }

}
