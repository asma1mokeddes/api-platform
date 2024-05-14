<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use Symfony\Component\Serializer\Annotation\Groups;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(), // tous les livres /livres
        new Post(), // creer un livre /livres + body
        new Get(denormalizationContext:['groups' => ['groupA']]), // un seul livre /livres/{id}
        // new Patch(), // modifie la ressource
        // new Put() // remplace la ressource
    ],
    normalizationContext:['groups' => ['read']],
    denormalizationContext: ["groups" => ["write"]],
)]
class Livre
{
    #[ApiProperty(identifier:false)] // info non exposée à l'extérieur de l'api et ce n'est pas lui la clé primaire
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ApiProperty(identifier:true, writable: false)]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ApiProperty(writable: true)]
    #[ORM\Column(length: 255)]
    #[Groups(['groupA'])]
    private ?string $description = null;


    #[ORM\Column(length: 255)]
    #[Groups(["read"])]
    private $titre;

    #[ORM\Column(length: 255)]
    #[Groups(["read"])]
    private $auteur;

    #[ORM\Column(length: 255)]
    #[Groups(["write"])]
    private $datePublication;

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

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }
    public function getDatePublication(): ?string
    {
        return $this->datePublication;
    }

    public function setDatePublication(string $datePublication): static
    {
        $this->datePublication = $datePublication;

        return $this;
    }
}
