<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BillRows", mappedBy="bills", orphanRemoval=true, cascade={"persist"})
     */
    private $BillRows;

    public function __construct()
    {
        $this->BillRows = new ArrayCollection();
    }

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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|BillRows[]
     */
    public function getBillRows(): Collection
    {
        return $this->BillRows;
    }

    public function addBillRow(BillRows $billRow): self
    {
        if (!$this->BillRows->contains($billRow)) {
            $this->BillRows[] = $billRow;
            $billRow->setBills($this);
        }

        return $this;
    }

    public function removeBillRow(BillRows $billRow): self
    {
        if ($this->BillRows->contains($billRow)) {
            $this->BillRows->removeElement($billRow);
            // set the owning side to null (unless already changed)
            if ($billRow->getBills() === $this) {
                $billRow->setBills(null);
            }
        }

        return $this;
    }
}
