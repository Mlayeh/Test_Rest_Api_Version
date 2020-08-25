<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GodzillaRepository")
 *
 * @Serializer\ExclusionPolicy("NONE")
 */
class Godzilla
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     *
     * @Serializer\Until("1.2")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     * @Serializer\Since("1.2")
     */
    private $color;

    /**
     * @Serializer\Accessor(getter="getFullName")
     * @Serializer\Since("1.3")
     */
    private $fullName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getFullName(): string
    {
        return sprintf('%s %s', $this->color, $this->name);
    }
}
