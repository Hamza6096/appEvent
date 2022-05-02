<?php

namespace App\Entity;

use App\Repository\UserListByEventsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserListByEventsRepository::class)]
class UserListByEvents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Event::class, inversedBy: 'userListByEvents')]
    private $events;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'userListByEvents')]
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvents(): ?Event
    {
        return $this->events;
    }

    public function setEvents(?Event $events): self
    {
        $this->events = $events;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }


}
