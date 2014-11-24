<?php

namespace Applicant\FacultyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApplicantFacultyBundle:Default:index.html.twig');
    }

    public function unitsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $institute = $em->getRepository('ApplicantFacultyBundle:Institutions')->findAll();
        $faculties = $em->getRepository('ApplicantFacultyBundle:Faculties')->findAll();
        return $this->render('ApplicantFacultyBundle:Default:units.html.twig', array('institute'=> $institute, 'faculties'=>$faculties));
    }

    public function instituteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $institute = $em->getRepository('ApplicantFacultyBundle:Institutions')->findOneById($id);
        return $this->render('ApplicantFacultyBundle:Default:institute.html.twig', array('institute'=> $institute));
    }

    public function facultyAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $faculty = $em->getRepository('ApplicantFacultyBundle:Faculties')->findOneById($id);
        return $this->render('ApplicantFacultyBundle:Default:institute.html.twig', array('faculty'=> $faculty));
    }

    public function facultiesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $faculties = $em->getRepository('ApplicantFacultyBundle:Faculties')->findAll();
        return $this->render('ApplicantFacultyBundle:Default:onlyfaculties.html.twig', array('faculties'=> $faculties));
    }

    public function institutesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $institute = $em->getRepository('ApplicantFacultyBundle:Institutions')->findAll();
        return $this->render('ApplicantFacultyBundle:Default:onlyinstitute.html.twig', array('institute'=> $institute));
    }

}
