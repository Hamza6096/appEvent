<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\UserListByEvents;
use App\U;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\OneToMany(mappedBy: 'events', targetEntity: UserListByEvents::class)]
    private $userListByEvents;

    public function __construct()
    {
        $this->userListByEvents = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function __tooString()
    {
        return $this->name();
    }

    /**
     * @return boolean
     */
    public function isUserSignedUp (User $user): bool
    {
        foreach ($this->userListByEvents as $userListByEvent){
            if($userListByEvent -> getUsers() === $user) return true;
        }
        return false;
    }

    /**
     * @return Collection<int, UserListByEvents>
     */
    public function getUserListByEvents(): Collection
    {
        return $this->userListByEvents;
    }

    public function addUserListByEvent(UserListByEvents $userListByEvent): self
    {
        if (!$this->userListByEvents->contains($userListByEvent)) {
            $this->userListByEvents[] = $userListByEvent;
            $userListByEvent->setEvents($this);
        }

        return $this;
    }

    public function removeUserListByEvent(UserListByEvents $userListByEvent): self
    {
        if ($this->userListByEvents->removeElement($userListByEvent)) {
            // set the owning side to null (unless already changed)
            if ($userListByEvent->getEvents() === $this) {
                $userListByEvent->setEvents(null);
            }
        }

        return $this;
    }
}
