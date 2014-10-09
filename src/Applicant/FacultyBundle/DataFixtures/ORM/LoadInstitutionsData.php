<?php

namespace Applicant\FacultyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\Doctrine;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Yaml\Yaml;
use Applicant\FacultyBundle\Entity\Institutions;

class LoadInstitutionsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $institutionsData = Yaml::parse($this->getYmlFile());

        foreach ($institutionsData['institutions'] as $institut)
        {
            $institutObject = new Institutions();

            $institutObject->setName($institut['name']);
            $institutObject->setAddress($institut['address']);
            $institutObject->setPhone($institut['phone']);
            $institutObject->setSite($institut['site']);
            $institutObject->setMail(!isset($institut['mail']) ? null : $institut['mail'] );
            $institutObject->setDirector($institut['director']);
            $manager->persist($institutObject);

            $this->addReference($institut['name'], $institutObject);
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
        return __DIR__ . '/data/institutions.yml';
    }
}