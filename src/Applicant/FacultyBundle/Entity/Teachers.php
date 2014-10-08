<?php

namespace Applicant\FacultyBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 */
class Teachers
{
    protected $id;

    protected $name;

    protected $post;

    protected $department;

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
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set department
     *
     * @param \Applicant\FacultyBundle\Entity\Departments $department
     * @return Departments
     */
    public function setDepartment(\Applicant\FacultyBundle\Entity\Departments $department= null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \Applicant\FacultyBundle\Entity\Departments
     */
    public function getDepartment()
    {
        return $this->department;
    }

}
