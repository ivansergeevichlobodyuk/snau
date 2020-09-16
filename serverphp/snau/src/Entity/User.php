<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $build;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $flatNum;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $uniqueOneTimeHash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @Assert\Regex(
     *     pattern="/^(?=.*[0-9])(?=.*[a-z])([a-zA-Z0-9]{5,})$/",
     *     match=true,
     *     message="BAD_PASSWORD"
     * )
     */
    private $plainPassword;


    /**
     * @ORM\Column( type="string", length=128)
     */
    private $password;


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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBuild(): ?string
    {
        return $this->build;
    }

    public function setBuild(?string $build): self
    {
        $this->build = $build;

        return $this;
    }

    public function getFlatNum(): ?int
    {
        return $this->flatNum;
    }

    public function setFlatNum(?int $flatNum): self
    {
        $this->flatNum = $flatNum;

        return $this;
    }

    public function getUniqueOneTimeHash(): ?string
    {
        return $this->uniqueOneTimeHash;
    }

    public function setUniqueOneTimeHash(?string $uniqueOneTimeHash): self
    {
        $this->uniqueOneTimeHash = $uniqueOneTimeHash;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }


    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $password): self
    {
        $this->plainPassword = $password;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


}
