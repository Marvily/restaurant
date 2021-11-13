<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="reservations")
     */
    private $restaurant;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDeReservation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDePersonne;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDateDeReservation(): ?\DateTimeInterface
    {
        return $this->dateDeReservation;
    }

    public function setDateDeReservation(\DateTimeInterface $dateDeReservation): self
    {
        $this->dateDeReservation = $dateDeReservation;

        return $this;
    }

    public function getNombreDePersonne(): ?int
    {
        return $this->nombreDePersonne;
    }

    public function setNombreDePersonne(int $nombreDePersonne): self
    {
        $this->nombreDePersonne = $nombreDePersonne;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
