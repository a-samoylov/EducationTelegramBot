<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;

/**
 * @ORM\Entity(repositoryClass="\App\Repository\UserRepository")
 */
class User
{
    private const INTENSITY_SMALL  = 1;
    private const INTENSITY_MEDIUM = 2;
    private const INTENSITY_LARGE  = 3;

    // ########################################

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $phone;

    /**
     * @var \App\Entity\TelegramChat
     * @ORM\OneToOne(targetEntity="App\Entity\TelegramChat")
     * @JoinColumn(name="chat_id", nullable=false, referencedColumnName="id")
     */
    private $chat;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $intensity;

    /**
     * @var \App\Entity\Subject[]
     * @ORM\ManyToMany(targetEntity="App\Entity\Subject")
     * @JoinTable(name="users_subjects",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="subject_id", referencedColumnName="id")}
     *      )
     */
    private $subjects;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default" : "0"})
     */
    private $isRegister;

    // ########################################

    public function __construct()
    {
        $this->subjects = new ArrayCollection();
    }

    // ########################################

    public function getId(): ?int
    {
        return $this->id;
    }

    // ########################################

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    // ########################################

    public function getIntensity(): ?int
    {
        return $this->intensity;
    }

    public function setIntensity(int $intensity): self
    {
        $this->intensity = $intensity;

        return $this;
    }

    public function hasIntensity(): bool
    {
        return is_null($this->intensity);
    }

    // ########################################

    public function isRegister(): bool
    {
        return $this->isRegister;
    }

    public function setIsRegister(bool $isRegister): self
    {
        $this->isRegister = $isRegister;

        return $this;
    }

    // ########################################

    public function getChat(): ?TelegramChat
    {
        return $this->chat;
    }

    public function setChat(TelegramChat $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    // ########################################

    /**
     * @return Collection|Subject[]
     */
    public function getSubjects(): Collection
    {
        return $this->subjects;
    }

    public function addSubject(Subject $subject): self
    {
        if (!$this->subjects->contains($subject)) {
            $this->subjects[] = $subject;
        }

        return $this;
    }

    public function removeSubject(Subject $subject): self
    {
        if ($this->subjects->contains($subject)) {
            $this->subjects->removeElement($subject);
        }

        return $this;
    }

    public function hasSubjects(): bool
    {
        return !empty($this->subjects);
    }

    public function getIsRegister(): ?bool
    {
        return $this->isRegister;
    }

    // ########################################
}
