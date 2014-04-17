<?php

namespace SSCM\SadminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {   
    	
       	return $this->render(
       	    'SadminBundle:Default:index.html.twig',
       	    array('name' => 'efrain')
       	);
    }

    public function loginAction()
    {
        return $this->render(
            'SadminBundle:Default:login.html.twig',
            array('name' => '')
        );
    }

    public function registerAction()
    {
        return $this->render(
            'SadminBundle:Default:register.html.twig',
            array('name' => '')
        );
    }

    public function regcheckAction()
    {
        return $this->render(
            'SadminBundle:Default:register.html.twig',
            array('name' => '')
        );
    }


    public function lostpasswordAction()
    {
        return $this->render(
            'SadminBundle:Default:lostpassword.html.twig',
            array('name' => '')
        );
    }

}
