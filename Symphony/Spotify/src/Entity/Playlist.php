<?php

namespace App\Entity;

use App\Repository\PlaylistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaylistRepository::class)]
class Playlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    /**
     * @var Collection<int, Cancion>
     */
    #[ORM\ManyToMany(targetEntity: Cancion::class, inversedBy: 'playlists')]
    private Collection $Canciones;


    #[ORM\ManyToOne(inversedBy: 'playlists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;

    public function __construct()
    {
        $this->Canciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * @return Collection<int, Cancion>
     */
    public function getCanciones(): Collection
    {
        return $this->Canciones;
    }

    public function addCancione(Cancion $cancione): self
    {
        if (!$this->Canciones->contains($cancione)) {
            $this->Canciones[] = $cancione;
            $cancione->addPlaylist($this);
        }

        return $this;
    }

    public function removeCancione(Cancion $cancione): static
    {
        $this->Canciones->removeElement($cancione);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}
