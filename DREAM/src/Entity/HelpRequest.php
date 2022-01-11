<?php

namespace App\Entity;

use App\Repository\HelpRequestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HelpRequestRepository::class)]
class HelpRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $timestamp;

    #[ORM\Column(type: 'string', length: 50)]
    private $title;

    #[ORM\Column(type: 'string', length: 1500)]
    private $text;

    #[ORM\ManyToOne(targetEntity: Farmer::class, inversedBy: 'helpRequests')]
    #[ORM\JoinColumn(nullable: false)]
    private $author;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'receivedRequests')]
    #[ORM\JoinColumn(nullable: false)]
    private $receiver;

    #[ORM\OneToOne(targetEntity: HelpReply::class, cascade: ['persist', 'remove'])]
    private $reply;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getAuthor(): ?Farmer
    {
        return $this->author;
    }

    public function setAuthor(?Farmer $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function setReceiver(?User $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getReply(): ?HelpReply
    {
        return $this->reply;
    }

    public function setReply(?HelpReply $reply): self
    {
        $this->reply = $reply;

        return $this;
    }
}