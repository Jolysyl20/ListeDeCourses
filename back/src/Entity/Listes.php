<?php

namespace App\Entity;

use App\Repository\ListesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListesRepository::class)
 */
class Listes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsBought;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getIsBought(): ?bool
    {
        return $this->IsBought;
    }

    public function setIsBought(bool $IsBought): self
    {
        $this->IsBought = $IsBought;

        return $this;
    }
}
