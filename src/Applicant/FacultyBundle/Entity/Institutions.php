<?php

namespace Applicant\FacultyBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class Institutions
{
    protected $id;

    protected $name;

    protected $address;

    protected $phone;

    protected $site;

    protected $mail;

    protected $director;

    protected $department;

    /*
     * Перший заступник директора
     */
    protected $firstdeputy;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $director
     */
    public function setDirector($director)
    {
        $this->director = $director;
    }

    /**
     * @return mixed
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param mixed $firstdeputy
     */
    public function setFirstdeputy($firstdeputy)
    {
        $this->firstdeputy = $firstdeputy;
    }

    /**
     * @return mixed
     */
    public function getFirstdeputy()
    {
        return $this->firstdeputy;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
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
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Add department
     *
     * @param \Applicant\FacultyBundle\Entity\Departments $department
     */
    public function addDepartment(\Applicant\FacultyBundle\Entity\Departments $department)
    {
        $this->department[] = $department;
        $department->setInstitut($this);

        return $this;
    }

    /**
     * Remove department
     *
     * @param \Applicant\FacultyBundle\Entity\Departments $department
     */
    public function removePhoto(\Applicant\FacultyBundle\Entity\Departments $department)
    {
        $this->department->removeElement($department);
    }

    /**
     * Get photo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartment()
    {
        return $this->department;
    }
}
