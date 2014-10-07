<?php

namespace Applicant\FacultyBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class Departments
{
    protected $id;

    protected $name;

    protected $address;

    protected $phone;

    protected $head;

    protected $faculty;

    protected $institut;

    protected $teacher;

    public function __construct()
    {
        $this->teacher = new ArrayCollection();
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
     * @param mixed $head
     */
    public function setHead($head)
    {
        $this->head = $head;
    }

    /**
     * @return mixed
     */
    public function getHead()
    {
        return $this->head;
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set faculty
     *
     * @param \Applicant\FacultyBundle\Entity\Faculties $faculty
     * @return Departments
     */
    public function setFaculty(\Applicant\FacultyBundle\Entity\Faculties $faculty = null)
    {
        $this->faculty = $faculty;

        return $this;
    }

    /**
     * Get faculty
     *
     * @return \Applicant\FacultyBundle\Entity\Faculties
     */
    public function getFaculty()
    {
        return $this->faculty;
    }

    /**
     * Set institut
     *
     * @param \Applicant\FacultyBundle\Entity\Institutions $institut
     * @return Departments
     */
    public function setInstitut(\Applicant\FacultyBundle\Entity\Institutions $institut= null)
    {
        $this->institut = $institut;

        return $this;
    }

    /**
     * Get institut
     *
     * @return \Applicant\FacultyBundle\Entity\Institutions
     */
    public function getInstitut()
    {
        return $this->institut;
    }


    /**
     * Add teacher
     *
     * @param \Applicant\FacultyBundle\Entity\Teachers $teacher
     */
    public function addTeacher(\Applicant\FacultyBundle\Entity\Teachers $teacher)
    {
        $this->teacher[] = $teacher;
        $teacher->setDepartment($this);

        return $this;
    }

    /**
     * Remove department
     *
     * @param \Applicant\FacultyBundle\Entity\Teachers $teacher
     */
    public function removeTeacher(\Applicant\FacultyBundle\Entity\Teachers $teacher)
    {
        $this->teacher->removeElement($teacher);
    }

    /**
     * Get photo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}
