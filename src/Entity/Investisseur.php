<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InvestisseurRepository")
 */
class Investisseur
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
    private $Mat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomSociete;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Convention", mappedBy="Mat")
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

    public function getMat(): ?string
    {
        return $this->Mat;
    }

    public function setMat(string $Mat): self
    {
        $this->Mat = $Mat;

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

    public function getNomSociete(): ?string
    {
        return $this->NomSociete;
    }

    public function setNomSociete(string $NomSociete): self
    {
        $this->NomSociete = $NomSociete;

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
            $convention->setMat($this);
        }

        return $this;
    }

    public function removeConvention(Convention $convention): self
    {
        if ($this->Convention->contains($convention)) {
            $this->Convention->removeElement($convention);
            // set the owning side to null (unless already changed)
            if ($convention->getMat() === $this) {
                $convention->setMat(null);
            }
        }

        return $this;
    }

}
