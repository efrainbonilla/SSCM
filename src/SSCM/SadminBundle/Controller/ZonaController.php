<?php
namespace SSCM\SadminBundle\Controller;

use SSCM\SadminBundle\Entity\ListZona;
use SSCM\SadminBundle\Entity\ListParroquia;
use SSCM\SadminBundle\Entity\Municipio;
use SSCM\SadminBundle\Entity\ListEstado;
use SSCM\SadminBundle\Entity\ListPais;
use SSCM\SadminBundle\Util\Utility;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

class ZonaController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Collection action
     * @param  Request $request  
     * @param  integer  $PaisId   
     * @param  string  $EdoId    
     * @param  string  $MuniId   
     * @param  string  $ParroqId 
     * @return array            
     * 
     * @Rest\View()
     */
    public function cgetAction(Request $request, $PaisId, $EdoId, $MuniId, $ParroqId)
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
    			$criteria['nombMuni'] = $value;
    	}

        /*$criteria['codiPais'] = $PaisId;
        $criteria['codiEdo'] = $EdoId;
        $criteria['codiMuni'] = $MuniId;*/
        $criteria['codiParroq'] = $ParroqId;

    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('SadminBundle:ListZona')
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
     * @param  string $EdoId    
     * @param  string $MuniId   
     * @param  string $ParroqId 
     * @param  integer $ZonaId   
     * @return array           
     * 
     * @Rest\View() 
     */
    public function getAction($PaisId, $EdoId, $MuniId, $ParroqId, $ZonaId)
    {
       $entity = $this->getEntity($PaisId, $EdoId, $MuniId, $ParroqId, $ZonaId);

        return array(
            'entity' => $entity,
        );
    }

    /**
     * Get entity instance
     * @param  integer $PaisId   
     * @param  string $EdoId    
     * @param  string $MuniId   
     * @param  string $ParroqId, $ZonaId 
     * @return ListParroquia           
     */
    protected function getEntity($PaisId, $EdoId, $MuniId, $ParroqId, $ZonaId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SadminBundle:ListZona')
            ->findBy(
                array(
                    /*'codiPais' => $PaisId, 
                    'codiEdo' => $EdoId, 
                    'codiMuni' => $MuniId, */
                    'codiParroq' => $ParroqId,
                    'codiZona' => $ZonaId
                )
            );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find estados in pais entity');
        }

        return $entity;
    }
}