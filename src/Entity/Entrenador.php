<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrenadorRepository")
 */
class Entrenador
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cognom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $primer_entrenador;

    /**
     * @ORM\Column(type="integer")
     */
    private $edat;

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

    public function getCognom(): ?string
    {
        return $this->cognom;
    }

    public function setCognom(string $cognom): self
    {
        $this->cognom = $cognom;

        return $this;
    }

    public function getPrimerEntrenador(): ?bool
    {
        return $this->primer_entrenador;
    }

    public function setPrimerEntrenador(bool $primer_entrenador): self
    {
        $this->primer_entrenador = $primer_entrenador;

        return $this;
    }

    public function getEdat(): ?int
    {
        return $this->edat;
    }

    public function setEdat(int $edat): self
    {
        $this->edat = $edat;

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
     * @ORM\ManyToMany(targetEntity="Equip", inversedBy="entrenadors")
     * @ORM\JoinTable(
     *     name="equip_entrenador",
     *     joinColumns={
     *          @ORM\JoinColumn(name="entrenador_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="equip_id", referencedColumnName="id")
     *     }
     * )
     */
    private $equips;

    public function __construct()
    {
      $this->equips = new ArrayCollection();
    }

  public function addEquip(Equip $equip)
  {
    if (!$this->equips->contains($equip)) {
      $this->equips[] = $equip;
      $equip->addEntrenador($this);
    }

    return $this;
  }

  public function removeEquip(Equip $equip)
  {
    if ($this->equips->contains($equip)) {
      $this->equips->removeElement($equip);
      $equip->removeEntrenador($this);
    }
  }

  public function getEquips()
  {
    return $this->equips;
  }

  public function __toString()
  {
    return $this->nom;
  }
}
