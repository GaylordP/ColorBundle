<?php

namespace GaylordP\ColorBundle\Entity;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use GaylordP\SluggableBundle\Annotation\Sluggable;
use GaylordP\UserBundle\Annotation\CreatedAt;
use GaylordP\UserBundle\Annotation\CreatedBy;
use GaylordP\UserBundle\Entity\Traits\Deletable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Color
 *
 * @ORM\Entity(repositoryClass="GaylordP\ColorBundle\Repository\ColorRepository")
 */
class Color
{
    use Deletable;

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=6)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 6,
     *      max = 6
     * )
     */
    private $rgb;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     * @Sluggable("name")
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     * @CreatedAt
     */
    private $createdAt;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @CreatedBy
     */
    private $createdBy;

    /**
     * Get name
     *
     * @return string 
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set name
     * 
     * @param string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get rgb
     *
     * @return string 
     */
    public function getRgb(): ?string
    {
        return $this->rgb;
    }

    /**
     * Set rgb
     * 
     * @param string $rgb
     */
    public function setRgb(?string $rgb): void
    {
        $this->rgb = strtolower($rgb);
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * Set slug
     * 
     * @param string $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $date
     */
    public function setCreatedAt(\DateTime $date): void
    {
        $this->createdAt = $date;
    }

    /**
     * Get createdBy
     *
     * @return User
     */
    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    /**
     * Set createdBy
     *
     * @param User $user
     */
    public function setCreatedBy(User $user): void
    {
        $this->createdBy = $user;
    }
}
