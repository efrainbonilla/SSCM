<?php 
namespace SSCM\SadminBundle\Controller;

use SSCM\SadminBundle\Entity\ListEstado;
use SSCM\SadminBundle\Entity\Municipio;
use SSCM\SadminBundle\Entity\ListPais;
use SSCM\SadminBundle\Entity\ListParroquia;
use SSCM\SadminBundle\Entity\ListZona;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller 
{
    public function dashboardAction()
    {
    	return $this->render(
    	    'SadminBundle:Dashboard:index.html.twig',
    	    array('name' => "")
    	);
    }

    public function profesoresAction()
    {
    	return $this->render(
    	    'SadminBundle:Dashboard:profesores.html.twig'
    	);
    }

    
    public function dynatableAction(Request $request)
    {

    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('SadminBundle:ListPais')->findAll();

    	$data = array(
    		'records' => array(
				array('title' => 'Titulo 1', 'content' => 'Contenido 1',  'code' => '0001' ), 
				array('title' => 'Titulo 2', 'content' => 'Contenido 2',  'code' => '0002' ), 
				array('title' => 'Titulo 3', 'content' => 'Contenido 3',  'code' => '0003' ), 
				array('title' => 'Titulo 4', 'content' => 'Contenido 4',  'code' => '0004' ), 
				array('title' => 'Titulo 5', 'content' => 'Contenido 5',  'code' => '0005' ), 
				/*array('title' => 'Titulo 6', 'content' => 'Contenido 6',  'code' => '0006' ), 
				array('title' => 'Titulo 7', 'content' => 'Contenido 7',  'code' => '0007' )*/
			),
			'totalRecordCount' => 5,
			'queryRecordCount' => 7,
			'request' => $request->request,
			'entity' => $entity
    	);

    	echo json_encode( $data );
    	exit();
    }
}