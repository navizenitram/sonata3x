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
     * @ORM\Column(type="integer")
     */
    private $bill_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBillId(): ?int
    {
        return $this->bill_id;
    }

    public function setBillId(int $bill_id): self
    {
        $this->bill_id = $bill_id;

        return $this;
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
}
