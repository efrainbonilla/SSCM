<?php

namespace SSCM\CipeeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MallaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MallaRepository extends EntityRepository
{
    public function findByAlmn($codiPfg, $codiMalla)
    {
        /*SELECT a.* FROM alumno a
        INNER JOIN estado_academico ea ON(a.cedu_almn=ea.cedu_almn)
        INNER JOIN malla m ON(m.codi_malla=ea.codi_malla)
        INNER JOIN pfg p ON(p.codi_pfg=m.codi_pfg)*/

        /*SELECT a FROM SSCM\CipeeBundle\Entity\Alumno a
        INNER JOIN SSCM\CipeeBundle\Entity\EstadoAcademico ea WITH a.ceduAlmn = ea.ceduAlmn
        INNER JOIN SSCM\CipeeBundle\Entity\Malla m WITH ea.codiMalla = m.codiMalla
        INNER JOIN SSCM\CipeeBundle\Entity\Pfg p WITH p.codiPfg = m.codiPfg
        WHERE (m.codiPfg = ?1) AND (m.codiMalla = ?2)*/

        $qb = $this->getEntityManager()->createQueryBuilder();

        return $qb->select('a')
                ->from('CipeeBundle:Alumno', 'a')
                ->innerJoin('CipeeBundle:EstadoAcademico', 'ea', 'WITH', 'a.ceduAlmn = ea.ceduAlmn')
                ->innerJoin('CipeeBundle:Malla', 'm', 'WITH', 'ea.codiMalla = m.codiMalla')
                ->innerJoin('CipeeBundle:Pfg', 'p', 'WITH', 'p.codiPfg = m.codiPfg')
                ->where($qb->expr()->andX($qb->expr()->eq('m.codiPfg', ':codi_pfg'), $qb->expr()->eq('m.codiMalla', ':codi_malla')))
                ->setParameters(array('codi_pfg' => $codiPfg, 'codi_malla' => $codiMalla))
                ->getQuery()
                ->execute();
    }
}
