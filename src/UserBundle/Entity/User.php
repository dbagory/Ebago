<?php
/**
 * Created by PhpStorm.
 * User: dbagory
 * Date: 9/14/17
 * Time: 3:12 PM
 */

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 * @package UserBundle\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="user_ebago")
 */


class User extends \FOS\UserBundle\Model\User
{
    /**
     * @var
     * @ORM\OneToMany(targetEntity="ProductBundle\Entity\Product", mappedBy="user")
     */
    protected $products;


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
     * Assert\NotBlank(message="Merci de renseigner votre prénom.", groups{"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="prénom trop court.",
     *     maxMessage="Prénom trop long.",
     *     groups={"Registration", "Profile"}
     *     )
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * Assert\NotBlank(message="Merci de renseigner votre nom.", groups{"Registration", "Profile"})
     */
    protected $last_name;

    /**
     * @ORM\Column(type="integer", length=5)
     *
     * Assert\NotBlank(message="Merci de renseigner votre code postal.")
     * @Assert\Length(
     *     min=5,
     *     max=5,
     *     minMessage="Code Postal non conforme",
     *     maxMessage="Code Postal non conforme",
     *     )
     */
    protected $code_postal;


    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return User
     */
    public function setCodePostal($codePostal)
    {
        $this->code_postal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * Add product
     *
     * @param \ProductBundle\Entity\Product $product
     *
     * @return User
     */
    public function addProduct(\ProductBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \ProductBundle\Entity\Product $product
     */
    public function removeProduct(\ProductBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}
