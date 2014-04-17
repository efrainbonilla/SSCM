<?php
namespace SSCM\SadminBundle\Controller;

use SSCM\SadminBundle\Entity\ListEstado;
use SSCM\SadminBundle\Entity\ListMunicipio;
use SSCM\SadminBundle\Entity\ListPais;
use SSCM\SadminBundle\Entity\ListParroquia;
use SSCM\SadminBundle\Entity\ListZona;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\Tools\Pagination\Paginator;

class PaisController extends FOSRestController implements ClassResourceInterface
{

	public function camelCase($str, $exclude=array())
	{
    	$str = preg_replace('/[^a-z0-9' . implode("", $exclude) . ']+/i', ' ', $str);
	    // uppercase the first character of each word
	    $str = ucwords(trim($str));
	    return lcfirst(str_replace(" ", "", $str));
	}
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
    			$orderBy[ $this->camelCase($key) ] = ($value == -1) ? 'DESC' : 'ASC' ;
    	}
    	if (is_array($queries)) {
    		foreach ($queries as $key => $value)
    			$criteria['nombPais'] = $value;
    	}

    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('SadminBundle:ListPais')
    		->findBy($criteria, $orderBy, $perPage, $offset );


 		/*return $this->getEntityManager()
        	->createQuery('...')
        	->setMaxResults(5)
        	->setFirstResult(10)
        	->getResult();*/

    	return array(
    		'records' => $entity,
			'totalRecordCount' => count($entity),
			'queryRecordCount' => 22,
			'request' => $criteria
    	);
    }
}