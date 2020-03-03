<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BillsRepository")
 */
class Bills
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
    private $bill_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $customer_id;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $total;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBillNumber(): ?string
    {
        return $this->bill_number;
    }

    public function setBillNumber(string $bill_number): self
    {
        $this->bill_number = $bill_number;

        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function setCustomerId(int $customer_id): self
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }
}
