<?php

namespace Applicant\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @@ExclusionPolicy("all")
 */
class User extends BaseUser
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


    /**
     * @Assert\Length(min=3, max="255", minMessage="The name is too short.", maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"})
     */
    protected  $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=20)
     */
    protected  $firstname;

    /**
     * @Assert\Length(min=3, max=20)
     */
    protected  $secondname;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3, max=20)
     */
    protected  $surname;

    protected $image = 'http://cs315930.vk.me/v315930249/2fd6/BVG-Slz47QI.jpg';

    /**
     * @Assert\Length(min=7, max=30)
     */
    protected $country;

    /**
     * @Assert\Length(min=8, max=30)
     */
    protected $city;

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $secondname
     */
    public function setSecondname($secondname)
    {
        $this->secondname = $secondname;
    }

    /**
     * @return mixed
     */
    public function getSecondname()
    {
        return $this->secondname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }
}
