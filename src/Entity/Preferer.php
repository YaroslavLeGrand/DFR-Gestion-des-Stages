<?php

namespace App\Entity;

use App\Repository\PrefererRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrefererRepository::class)
 */
class Preferer
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Specialitee::class)
     */
    private $IdSpecialitee;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Classe::class)
     */
    private $IdClasse;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="IdPreferer")
     */
    private $IdEntreprise;

    public function __construct()
    {
        $this->IdSpecialitee = new ArrayCollection();
        $this->IdClasse = new ArrayCollection();
        $this->IdEntreprise = new ArrayCollection();
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
