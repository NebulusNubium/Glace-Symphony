<?php

namespace App\Entity;

use App\Repository\GlaceRepository;
use App\Repository\ToppingsRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: GlaceRepository::class)]
class Glace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'images' , fileNameProperty: 'imageName')]
    private ?File $imageFile = null;
    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;
    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredientSpecial = null;

    #[ORM\ManyToOne(inversedBy: 'glaces')]
    private ?Cone $cone = null;

    /**
     * @var Collection<int, Toppings>
     */
    #[ORM\ManyToMany(targetEntity: Toppings::class, inversedBy: 'glaces')]
    private Collection $topping;

    public function __construct()
    {
        $this->topping = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIngredientSpecial(): ?string
    {
        return $this->ingredientSpecial;
    }

    public function setIngredientSpecial(string $ingredientSpecial): static
    {
        $this->ingredientSpecial = $ingredientSpecial;

        return $this;
    }

    public function getCone(): ?Cone
    {
        return $this->cone;
    }

    public function setCone(?Cone $cone): static
    {
        $this->cone = $cone;

        return $this;
    }

        public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if($imageFile){
            $this->updatedAt = new \DateTimeImmutable();
        }
    } 
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }
    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection<int, Toppings>
     */
    public function getTopping(): Collection
    {
        return $this->topping;
    }

    public function addTopping(Toppings $topping): static
    {
        if (!$this->topping->contains($topping)) {
            $this->topping->add($topping);
        }

        return $this;
    }

    public function removeTopping(Toppings $topping): static
    {
        $this->topping->removeElement($topping);

        return $this;
    }


}
