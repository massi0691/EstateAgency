<?php

namespace App\Entity;

use App\Entity\Traits\TimeStampable;
use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Cocur\Slugify\Slugify;




/**
 * @ORM\Entity(repositoryClass=PropertyRepository::class) 
 * @ORM\HasLifecycleCallbacks 
 * @ORM\Table(name="properties")
 * @uniqueEntity("title")
 */
class Property
{
    const TYPE = [
        0 => 'Villa',
        1 => 'Dublex',
        2 => 'Studio'
    ];

    const STATUS = [
        0 => 'A louer',
        1 => 'A vendre'
    ];





    use TimeStampable;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(min=4)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Donner un titre à votre bien")
     * @Assert\Length(min=16)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Une brieve description de bien")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="donner la superficie de bien")
     */
    private $rooms;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="le nombre de piéces est obligatoire")
     */
    private $bedrooms;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="le nombre de chambres est obligatoire")
     */
    private $floor;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="il faut citer a ville de bien")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="indiquer l'adresse de bien")
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="indiquer  le code posatl de bien")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $sold = false;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Mentionnez si le bien disponible ou pas (louer ou vendu et vis versa")
     */
    private $parking;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Obligatoire")
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Mentionnez le type de bien")
     */
    private $type;


    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="indiquer  le prix de bien")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Dites dans quel pays ce trouve le bien")
     */

    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->title);
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

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->bedrooms;
    }

    public function setBedrooms(int $bedrooms): self
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function isSold(): ?bool
    {
        return $this->sold;
    }


    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    public function getParking(): ?int
    {
        return $this->parking;
    }

    public function setParking(int $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }
    public function getStatusType(): string
    {
        return self::STATUS[$this->status];
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }
    public function getTypeType(): string
    {
        return self::TYPE[$this->type];
    }


    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getFormattedPrice(): string
    {
        return number_format($this->price, 0, '', ' ');
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
