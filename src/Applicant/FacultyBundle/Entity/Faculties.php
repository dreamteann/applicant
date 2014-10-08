<?php

namespace Applicant\FacultyBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class Faculties
{
    protected $id;

    protected $name;

    protected $address;

    protected $phone;

    protected $site;

    protected $mail;

    protected $dean;

    protected $department;

    public function __construct()
    {
        $this->department = new ArrayCollection();
    }

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
     * @param mixed $dean
     */
    public function setDean($dean)
    {
        $this->dean = $dean;
    }

    /**
     * @return mixed
     */
    public function getDean()
    {
        return $this->dean;
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
        $department->setFaculty($this);

        return $this;
    }

    /**
     * Remove department
     *
     * @param \Applicant\FacultyBundle\Entity\Departments $department
     */
    public function removeDepartment(\Applicant\FacultyBundle\Entity\Departments $department)
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