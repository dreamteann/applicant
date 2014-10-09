<?php

namespace Applicant\FacultyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\Doctrine;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Yaml\Yaml;
use Applicant\FacultyBundle\Entity\Faculties;

class LoadFacultiesData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $facultiesData = Yaml::parse($this->getYmlFile());

        foreach ($facultiesData['faculties'] as $faculty)
        {
            $facultyObject = new Faculties();

            $facultyObject->setName($faculty['name']);
            $facultyObject->setAddress($faculty['address']);
            $facultyObject->setPhone($faculty['phone']);
            $facultyObject->setSite($faculty['site']);
            $facultyObject->setMail(!isset($faculty['mail']) ? null : $faculty['mail'] );
            $facultyObject->setDean($faculty['dean']);
            $manager->persist($facultyObject);

            $this->addReference($faculty['name'], $facultyObject);
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
        return 1;
    }

    protected function getYmlFile()
    {
        return __DIR__ . '/data/faculties.yml';
    }
}