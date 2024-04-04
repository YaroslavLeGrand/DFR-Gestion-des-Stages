<?php

namespace App\Entity;

use App\Repository\EmailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmailRepository::class)
 */
class Email
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $EmailLibelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailLibelle(): ?string
    {
        return $this->EmailLibelle;
    }

    public function setEmailLibelle(string $EmailLibelle): self
    {
        $this->EmailLibelle = $EmailLibelle;

        return $this;
    }
}
