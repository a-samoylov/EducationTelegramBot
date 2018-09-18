<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

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
     * @ORM\Column(type="string", length=50)
     */
    private $phone;

    /**
     * @var \App\Entity\TelegramChat
     * @ORM\OneToOne(targetEntity="App\Entity\TelegramChat")
     * @JoinColumn(name="chat_id", nullable=false, referencedColumnName="chat_id")
     */
    private $chat;

    /**
     * @ORM\Column(type="smallint")
     */
    private $intensity;

    /**
     * @var \App\Entity\Subject[]
     * @ORM\OneToMany(targetEntity="App\Entity\Subject", mappedBy="subject_id")
     */
    private $subjects;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRegister;

    // ########################################

    public function getId(): ?int
    {
        return $this->id;
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
}
