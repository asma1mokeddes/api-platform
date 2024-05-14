<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Put;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(), // tous les livres /livres
        new Post(), // creer un livre /livres + body
        new Get(), //un seul livre /livres/{id}
        new Patch(), // modifie la ressource
        new Put() // remplace la ressource
    ]
)]
class Livre
{
    #[ApiProperty(identifier:false)] // info non exposée à l'extérieur de l'api et ce n'est pas lui la clé primaire
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ApiProperty(identifier:true)]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
