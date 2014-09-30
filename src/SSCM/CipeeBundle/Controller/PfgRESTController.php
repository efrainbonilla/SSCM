<?php

namespace SSCM\CipeeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View as FOSView;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use SSCM\CipeeBundle\Entity\Pfg;
use SSCM\CipeeBundle\Form\PfgType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Voryx\RESTGeneratorBundle\Controller\VoryxController;

/**
 * Pfg controller.
 * @RouteResource("Pfg")
 */
class PfgRESTController extends VoryxController
{
    /**
     * Get a Pfg entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @return Response
     *
     */
    public function getAction(Pfg $entity)
    {
        return $entity;
    }
    /**
     * Get all Pfg entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param ParamFetcherInterface $paramFetcher
     *
     * @return Response
     *
     * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
     * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
     * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
     * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
     */
    public function cgetAction(ParamFetcherInterface $paramFetcher)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('CipeeBundle:Pfg')->findBy($filters, $order_by, $limit, $offset);
            if ($entities) {
                return $entities;
            }

            return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create a Pfg entity.
     *
     * @View(statusCode=201, serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param Request $request
     *
     * @return Response
     *
     */
    public function postAction(Request $request)
    {
        $entity = new Pfg();
        $req = $request->request;

        $form = $this->createForm(new PfgType(), $entity, array("method" => $request->getMethod()));
        $this->removeExtraFields($request, $form);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $entity;
        }

        return FOSView::create(array('errors' => $form->getErrors()), Codes::HTTP_INTERNAL_SERVER_ERROR);
    }
    /**
     * Update a Pfg entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
     */
    public function putAction(Request $request, Pfg $entity)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $request->setMethod('PATCH'); //Treat all PUTs as PATCH
            $form = $this->createForm(new PfgType(), $entity, array("method" => $request->getMethod()));
            $this->removeExtraFields($request, $form);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->flush();

                return $entity;
            }

            return FOSView::create(array('errors' => $form->getErrors()), Codes::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Partial Update to a Pfg entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param Request $request
     * @param $entity
     *
     * @return Response
    */
    public function patchAction(Request $request, Pfg $entity)
    {
        return $this->putAction($request, $entity);
    }
    /**
     * Delete a Pfg entity.
     *
     * @View(statusCode=204)
     * @ApiDoc()
     *
     * @param Request $request
     * @param $entity
     * @internal param $id
     *
     * @return Response
     */
    public function deleteAction(Request $request, Pfg $entity)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entity);
            $em->flush();

            return null;
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Get all Pfg/Mallas entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param $codiPfg
     *
     * @return Response
     * 
     */
    public function getMallasAction($codiPfg)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select(array('m.codiMalla AS codi_malla', 'm.nombMalla AS nomb_malla')  /*'m'*/)
                ->from('SSCM\CipeeBundle\Entity\Malla', 'm')
                ->innerJoin('m.codiPfg', 'p', 'm.codiPfg = p.codiPfg')
                ->where('m.codiPfg = ?1')
                ->setParameter(1, $codiPfg);

        $query  = $qb->getQuery();
        $results = $query->execute();

        if ($results) {

            return $results;



            $dql    = $query->getDql();
            return array(
                array('dql' => $dql),
                array('entity' => $results)
            );
        }

        return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    }

    /**
     * Get all Pfg/Alumnos entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param $codiPfg
     *
     * @return Response
     * 
     */
    public function getAlumnosAction($codiPfg)
    {

        /*SELECT a.* FROM alumno a
        INNER JOIN estado_academico ea ON(a.cedu_almn=ea.cedu_almn)
        INNER JOIN malla m ON(m.codi_malla=ea.codi_malla)
        INNER JOIN pfg p ON(p.codi_pfg=m.codi_pfg)*/

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('a')
                ->from('SSCM\CipeeBundle\Entity\EstadoAcademico', 'ea')
                ->innerJoin('ea.ceduAlmn', 'a', 'ea.ceduAlmn = a.ceduAlmn')
                ->innerJoin('ea.codiMalla', 'm', 'ea.codiMalla = m.codiMalla')
                ->innerJoin('m.codiPfg', 'p', 'm.codiPfg = m.codiMalla')
                ->where('m.codiPfg = ?1')
                ->setParameter(1, $codiPfg);

        $query  = $qb->getQuery();
        $results = $query->execute();

        if ($results) {

            return $results;



            $dql    = $query->getDql();
            return array(
                array('dql' => $dql),
                array('entity' => $results)
            );
        }

        return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    }

}
