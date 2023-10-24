<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $product = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $payement_method = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Client $client = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Address $address = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?Address $billing = null;

    #[ORM\ManyToOne(inversedBy: 'shipping')]
    private ?Address $shipping = null;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getPayementMethod(): ?string
    {
        return $this->payement_method;
    }

    public function setPayementMethod(?string $payement_method): static
    {
        $this->payement_method = $payement_method;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $addresses): static
    {
        $this->address = $addresses;

        return $this;
    }

    public function getBilling(): ?Address
    {
        return $this->billing;
    }

    public function setBilling(?Address $billing): static
    {
        $this->billing = $billing;

        return $this;
    }

    public function getShipping(): ?Address
    {
        return $this->shipping;
    }

    public function setShipping(?Address $shipping): static
    {
        $this->shipping = $shipping;

        return $this;
    }


    
}
