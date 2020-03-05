<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BillRowsRepository")
 */
class BillRows
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
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bills", inversedBy="BillRows")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bills;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $price;

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBills(): ?Bills
    {
        return $this->bills;
    }

    public function setBills(?Bills $bills): self
    {
        $this->bills = $bills;

        return $this;
    }
}
