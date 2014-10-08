<?php

namespace Applicant\FacultyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\Doctrine;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Yaml\Yaml;
use Applicant\FacultyBundle\Entity\Departments;

class LoadDepartmentsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $departmentsData = Yaml::parse($this->getYmlFile());

        foreach ($departmentsData['departments'] as $department)
        {
            $departmentObject = new Departments();

            $departmentObject->setName($department['name']);
            $departmentObject->setAddress(!isset($department['address']) ? null : $department['address']);
            $departmentObject->setPhone(!isset($department['phone']) ? null : $department['phone']);
            $departmentObject->setPhone($department['head']);
            $departmentObject->setFaculty(!isset($department['faculty']) ? null : $this->getReference($department['faculty']));
            $departmentObject->setInstitut(!isset($department['institut']) ? null : $this->getReference($department['institut']));
            $manager->persist($departmentObject);

            $this->addReference($department['name'], $departmentObject);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

    protected function getYmlFile()
    {
        return __DIR__ . '/data/departments.yml';
    }
}