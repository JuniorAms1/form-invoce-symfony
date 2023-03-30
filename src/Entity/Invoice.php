<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Invoice_date = null;

    #[ORM\Column]
    private ?int $Invoice_number = null;

    #[ORM\Column]
    private ?int $Custumer_Id = null;

    #[ORM\OneToOne(mappedBy: 'Invoice_Id', cascade: ['persist', 'remove'])]
    private ?InvoiceLines $invoiceLines = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->Invoice_date;
    }

    public function setInvoiceDate(\DateTimeInterface $Invoice_date): self
    {
        $this->Invoice_date = $Invoice_date;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->Invoice_number;
    }

    public function setInvoiceNumber(int $Invoice_number): self
    {
        $this->Invoice_number = $Invoice_number;

        return $this;
    }

    public function getCustumerId(): ?int
    {
        return $this->Custumer_Id;
    }

    public function setCustumerId(int $Custumer_Id): self
    {
        $this->Custumer_Id = $Custumer_Id;

        return $this;
    }
//For mapping Entities invoice and InvoiceLines 
public function __toString()
{
    return $this->getId();
}
// End of mapping
    public function getInvoiceLines(): ?InvoiceLines
    {
        return $this->invoiceLines;
    }

    public function setInvoiceLines(InvoiceLines $invoiceLines): self
    {
        // set the owning side of the relation if necessary
        if ($invoiceLines->getInvoiceId() !== $this) {
            $invoiceLines->setInvoiceId($this);
        }

        $this->invoiceLines = $invoiceLines;

        return $this;
    }
}
