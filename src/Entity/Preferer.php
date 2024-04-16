<?php

namespace App\Entity;

use App\Repository\PrefererRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrefererRepository::class)
 */
class Preferer
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Specialitee::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSpecialitee;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Classe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdClasse;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="preferers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdEntreprise;

    public function getIdSpecialitee(): ?Specialitee
    {
        return $this->IdSpecialitee;
    }

    public function setIdSpecialitee(?Specialitee $IdSpecialitee): self
    {
        $this->IdSpecialitee = $IdSpecialitee;

        return $this;
    }

    public function getIdClasse(): ?Classe
    {
        return $this->IdClasse;
    }

    public function setIdClasse(?Classe $IdClasse): self
    {
        $this->IdClasse = $IdClasse;

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
