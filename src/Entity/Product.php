<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

//#[ORM\Entity(repositoryClass: ProductRepository::class)]
/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */ 
class Product
{
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column(type: 'integer')]
    /**
     * @ORM\Id 
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */ 
    private $id;
    
    /**
     * @ORM\Column(type="float")
     */ 
    private $price;
    
    //#[ORM\Column(type: 'string', length: 255)]
    /**
     * @ORM\Column(type="string", length=255)
     */ 
    private $name;

    //#[ORM\Column(type: 'string', length: 255)]
     /**
     * @ORM\Column(type="string", length=255) 
     */ 
    private $slug;

    //#[ORM\Column(type: 'string', length: 255)]
    /**
     * @ORM\Column(type="string", length=255)
     */ 
    private $image;

    //#[ORM\Column(type: 'string', length: 255)]
    /**
     * @ORM\Column(type="string", length=255)
     */ 
    private $subtitle;

    //#[ORM\Column(type: 'text')]
    /**
     * @ORM\Column(type="text")
     */ 
    private $description;

    // #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    // #[ORM\JoinColumn(nullable: false)]
    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     */
    private $category;

    //#[ORM\Column(type: 'boolean')]
    /*
     * @ORM\Column(type="boolean")
     */
    private $isInHome;

    
    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="product")
     */
    private $avis;
    public function __construct()
    {
        $this->avis = new ArrayCollection();
    //    $this->commandeDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return  $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
 
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getIsInHome(): ?bool
    {
        return $this->isInHome;
    }

    public function setIsInHome(bool $isInHome): self
    {
        $this->isInHome = $isInHome;

        return $this;
    }    
    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setProduct($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getProduct() === $this) {
                $avi->setProduct(null);
            }
        }
        return $this;
    }
}
