<?php
namespace SSCM\SadminBundle\Entity;


use Doctrine\ORM\EntityRepository;

/**
 * ListPaisRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ListPaisRepository extends EntityRepository
{
	public function findPais($orderBy, $limit, $offset)
	{
	    $qb =  $this->createQueryBuilder('p')
	        /*->leftJoin('p.company','c')
	        ->leftJoin('p.branch','b')*/
	        ->setFirstResult($offset)
	        ->setMaxResults($limit)
	    ;
	    if (!empty($orderBy)) {
	        $qb->orderBy(key($orderBy), reset($orderBy));
	    }
	    return $qb
	        ->getQuery() 
	        ->getResult();
	}
}
