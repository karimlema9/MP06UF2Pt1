<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipRepository")
 */
class Equip
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $categoria;

    /**
     * @ORM\Column(type="integer")
     */
    private $divisio;

    /**
     * @ORM\Column(type="date")
     */
    private $any_fundacio;

    /**
     * @ORM\Column(type="integer")
     */
    private $partits_jugats;

    /**
     * @ORM\Column(type="integer")
     */
    private $partits_guanyats;

    /**
     * @ORM\Column(type="integer")
     */
    private $partits_empatats;

    /**
     * @ORM\Column(type="integer")
     */
    private $partits_perduts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getDivisio(): ?int
    {
        return $this->divisio;
    }

    public function setDivisio(int $divisio): self
    {
        $this->divisio = $divisio;

        return $this;
    }

    public function getAnyFundacio(): ?\DateTimeInterface
    {
        return $this->any_fundacio;
    }

    public function setAnyFundacio(\DateTimeInterface $any_fundacio): self
    {
        $this->any_fundacio = $any_fundacio;

        return $this;
    }

    public function getPartitsJugats(): ?int
    {
        return $this->partits_jugats;
    }

    public function setPartitsJugats(int $partits_jugats): self
    {
        $this->partits_jugats = $partits_jugats;

        return $this;
    }

    public function getPartitsGuanyats(): ?int
    {
        return $this->partits_guanyats;
    }

    public function setPartitsGuanyats(int $partits_guanyats): self
    {
        $this->partits_guanyats = $partits_guanyats;

        return $this;
    }

    public function getPartitsEmpatats(): ?int
    {
        return $this->partits_empatats;
    }

    public function setPartitsEmpatats(int $partits_empatats): self
    {
        $this->partits_empatats = $partits_empatats;

        return $this;
    }

    public function getPartitsPerduts(): ?int
    {
        return $this->partits_perduts;
    }

    public function setPartitsPerduts(int $partits_perduts): self
    {
        $this->partits_perduts = $partits_perduts;

        return $this;
    }

    //x
  /**
   * @ORM\ManyToMany(targetEntity="Entrenador", mappedBy="equips")
   */
  private $entrenadors;

  public function __construct()
  {
    $this->entrenadors = new ArrayCollection();
  }

  public function addEntrenador(Entrenador $entrenador)
  {
    if (!$this->entrenadors->contains($entrenador)) {
      $this->entrenadors[] = $entrenador;
      $entrenador->addEquip($this);
    }

    return $this;
  }

  public function removeEntrenador(Entrenador $entrenador)
  {
    if ($this->entrenadors->contains($entrenador)) {
      $this->entrenadors->removeElement($entrenador);
      $entrenador->removeEquip($this);
    }
  }

  public function getEntrenadors()
  {
    return $this->entrenadors;
  }

  public function __toString()
  {
    return $this->nom;
  }

}
