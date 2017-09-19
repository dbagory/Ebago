<?php
/**
 * Created by PhpStorm.
 * User: dbagory
 * Date: 9/14/17
 * Time: 3:12 PM
 */

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Product
 * @package UserBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="product_ebago")
 */


class Product
{
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="products")
     */
    protected $user;
    /**
     * @var
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * Assert\NotBlank(message="Merci de renseigner un titre.")
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Titre trop court.",
     *     maxMessage="Titre trop long.",
     *     )
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     *
     * Assert\NotBlank(message="Merci de renseigner un descritptif.")
     */
    protected $description;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1))
     *
     * Assert\NotBlank(message="Merci de renseigner un prix.")
     *
     */
    protected $prix;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Product
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Product
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
