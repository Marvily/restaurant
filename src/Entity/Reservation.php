<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation implements TimestampableInterface
{
    use TimestampableTrait;

    public const TYPE_MIDI = 'midi';
    public const TYPE_SOIR = 'soir';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $type = self::TYPE_MIDI;

    /**
     * @ORM\Column(type="string")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="reservations")
     */
    private $restaurant;

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

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Reservation
     */
    public function setType(string $type): Reservation
    {
        $this->type = $type;
        return $this;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
        return $this;
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

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

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
        if (null !== $user) {
            $this->prenom = $user->getEmail();
            $this->nom = $user->getEmail();
        }

        return $this;
    }
}
