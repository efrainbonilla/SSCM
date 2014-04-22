<?php
namespace SSCM\SadminBundle\Controller;

use SSCM\SadminBundle\Entity\ListPais;
use SSCM\SadminBundle\Util\Utility;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

class RegionController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * Collection action
	 * @param  Request $request 
	 * @return array           
     * 
     * @Rest\View()
	 */
    public function cgetAction(Request $request)
    {
    	$page = $request->query->get('page');
    	$offset = $request->query->get('offset');
	   	$sorts = $request->query->get('sorts');
    	$queries = $request->query->get('queries');

    	$perPage = $request->query->get('perPage');

    	$orderBy = $criteria = array();

    	if (is_array($sorts)) {
    		foreach ($sorts as $key => $value)
    			$orderBy[ Utility::camelCase($key) ] = ($value == -1) ? 'DESC' : 'ASC' ;
    	}
    	if (is_array($queries)) {
    		foreach ($queries as $key => $value)
    			$criteria['nombPais'] = $value;
    	}

    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('SadminBundle:ListPais')
    		->findBy($criteria, $orderBy, $perPage, $offset );

    	return array(
    		'records' => $entity,
			'totalRecordCount' => count($entity),
			'queryRecordCount' => 22,
			'request' => $criteria
    	);
    }

    /**
     * Get action
     * @param  integer $PaisId 
     * @return array    
     * 
     * @Rest\View() 
     */
    public function getAction($PaisId)
    {
       $entity = $this->getEntity($PaisId);

        return array(
            'entity' => $entity,
        );
    }

    /**
     * Get entity instance
     * @param  integer $id 
     * @return ListPais     
     */
    protected function getEntity($PaisId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListPais')->find($PaisId);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pais entity');
        }

        return $entity;
    }
}