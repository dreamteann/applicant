<?php

namespace Applicant\FacultyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\Doctrine;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Yaml\Yaml;
use Applicant\FacultyBundle\Entity\Teachers;

class LoadTeachersData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $teachersData = Yaml::parse($this->getYmlFile());

        foreach ($teachersData['teachers'] as $teacher)
        {
            $teacherObject = new Teachers();

            $teacherObject->setName($teacher['name']);
            $teacherObject->setPost($teacher['post']);
            $teacherObject->setDepartment($this->getReference($teacher['department']));
            $manager->persist($teacherObject);
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
        return 3;
    }

    protected function getYmlFile()
    {
        return __DIR__ . '/data/teachers.yml';
    }
}