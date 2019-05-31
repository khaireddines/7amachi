<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConventionRepository")
 */
class Convention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Debut;

    /**
     * @var Project[]|ArrayCollection
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="Convention")
     */
    private $CodeP;

    /**
     * @var Investisseur[]|ArrayCollection
     * @ORM\ManyToOne(targetEntity="App\Entity\Investisseur", inversedBy="Convention")
     */
    private $Mat;

    public function __construct()
    {
        $this->CodeP=new ArrayCollection();
        $this->Mat=new ArrayCollection();
        
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->Date_Debut;
    }

    public function setDateDebut(\DateTimeInterface $Date_Debut): self
    {
        $this->Date_Debut = $Date_Debut;

        return $this;
    }

    public function getCodeP()
    {
        return $this->CodeP;
    }

    public function setCodeP(?Project $CodeP): self
    {
        $this->CodeP = $CodeP;

        return $this;
    }

    public function getMat()
    {
        return $this->Mat;
    }

    public function setMat(?Investisseur $Mat): self
    {
        $this->Mat = $Mat;

        return $this;
    }
}
