<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $Identifiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MotDePasse;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdRole;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getIdentifiant(): ?string
    {
        return $this->Identifiant;
    }

    public function setIdentifiant(string $Identifiant): self
    {
        $this->Identifiant = $Identifiant;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->MotDePasse;
    }

    public function setMotDePasse(string $MotDePasse): self
    {
        $this->MotDePasse = $MotDePasse;

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->IdRole;
    }

    public function setIdRole(?Role $IdRole): self
    {
        $this->IdRole = $IdRole;

        return $this;
    }
}
