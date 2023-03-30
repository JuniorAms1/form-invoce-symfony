<?php

namespace App\Entity;

use App\Repository\InvoiceLinesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceLinesRepository::class)]
class InvoiceLines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Quantity = null;

    #[ORM\Column]
    private ?float $Amount = null;

    #[ORM\Column]
    private ?float $VAT_Amount = null;

    #[ORM\Column]
    private ?float $Total_with_VAT = null;

    #[ORM\OneToOne(inversedBy: 'invoiceLines', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Invoice $Invoice_Id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->Amount;
    }

    public function setAmount(float $Amount): self
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getVATAmount(): ?float
    {
        return $this->VAT_Amount;
    }

    public function setVATAmount(float $VAT_Amount): self
    {
        $this->VAT_Amount = $VAT_Amount;

        return $this;
    }

    public function getTotalWithVAT(): ?float
    {
        return $this->Total_with_VAT;
    }

    public function setTotalWithVAT(float $Total_with_VAT): self
    {
        $this->Total_with_VAT = $Total_with_VAT;

        return $this;
    }

    public function getInvoiceId(): ?Invoice
    {
        return $this->Invoice_Id;
    }

    public function setInvoiceId(Invoice $Invoice_Id): self
    {
        $this->Invoice_Id = $Invoice_Id;

        return $this;
    }
}
