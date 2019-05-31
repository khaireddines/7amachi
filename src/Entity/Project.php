<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CodeP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LibelleP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SecteurP;

    /**
     * @ORM\Column(type="integer")
     */
    private $CoutFixe;

    /**
     * @ORM\Column(type="integer")
     */
    private $CoutVar;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DureeP;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Convention", mappedBy="CodeP")
     */
    private $Convention;

    public function __construct()
    {
        $this->Convention = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeP(): ?string
    {
        return $this->CodeP;
    }

    public function setCodeP(string $CodeP): self
    {
        $this->CodeP = $CodeP;

        return $this;
    }

    public function getLibelleP(): ?string
    {
        return $this->LibelleP;
    }

    public function setLibelleP(string $LibelleP): self
    {
        $this->LibelleP = $LibelleP;

        return $this;
    }

    public function getSecteurP(): ?string
    {
        return $this->SecteurP;
    }

    public function setSecteurP(string $SecteurP): self
    {
        $this->SecteurP = $SecteurP;

        return $this;
    }

    public function getCoutFixe(): ?int
    {
        return $this->CoutFixe;
    }

    public function setCoutFixe(int $CoutFixe): self
    {
        $this->CoutFixe = $CoutFixe;

        return $this;
    }

    public function getCoutVar(): ?int
    {
        return $this->CoutVar;
    }

    public function setCoutVar(int $CoutVar): self
    {
        $this->CoutVar = $CoutVar;

        return $this;
    }

    public function getDureeP(): ?\DateTimeInterface
    {
        return $this->DureeP;
    }

    public function setDureeP(\DateTimeInterface $DureeP): self
    {
        $this->DureeP = $DureeP;

        return $this;
    }

    /**
     * @return Collection|Convention[]
     */
    public function getConvention(): Collection
    {
        return $this->Convention;
    }

    public function addConvention(Convention $convention): self
    {
        if (!$this->Convention->contains($convention)) {
            $this->Convention[] = $convention;
            $convention->setCodeP($this);
        }

        return $this;
    }

    public function removeConvention(Convention $convention): self
    {
        if ($this->Convention->contains($convention)) {
            $this->Convention->removeElement($convention);
            // set the owning side to null (unless already changed)
            if ($convention->getCodeP() === $this) {
                $convention->setCodeP(null);
            }
        }

        return $this;
    }

    
}
