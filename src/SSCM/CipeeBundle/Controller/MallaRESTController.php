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
use SSCM\CipeeBundle\Entity\Malla;
use SSCM\CipeeBundle\Entity\Pfg;
use SSCM\CipeeBundle\Form\MallaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Voryx\RESTGeneratorBundle\Controller\VoryxController;

/**
 * Malla controller.
 * @RouteResource("Malla")
 */
class MallaRESTController extends VoryxController
{
    /**
     * Get a Malla entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @return Response
     *
     */
    public function getAction($codiPfg, Malla $entity)
    {
        return $entity;
    }
    /**
     * Get all Malla entities.
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
    public function cgetAction(ParamFetcherInterface $paramFetcher, $codiPfg)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

            $filters['codiPfg'] = $codiPfg;

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('CipeeBundle:Malla')->findBy($filters, $order_by, $limit, $offset);
            if ($entities) {
                return $entities;
            }

            return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    /**
     * Create a Malla entity.
     *
     * @View(statusCode=201, serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param Request $request
     *
     * @return Response
     *
     */
    public function postAction(Request $request, $codiPfg)
    {
        $entity = new Malla();
        $form = $this->createForm(new MallaType(), $entity, array("method" => $request->getMethod()));
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
     * Update a Malla entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param Request $request
     * @param $codiPfg
     * @param $entity
     *
     * @return Response
     */
    public function putAction(Request $request, $codiPfg, Malla $entity)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $request->setMethod('PATCH'); //Treat all PUTs as PATCH
            $form = $this->createForm(new MallaType(), $entity, array("method" => $request->getMethod()));
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
     * Partial Update to a Malla entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $codiPfg
     * @param $entity
     *
     * @return Response
    */
    public function patchAction(Request $request, $codiPfg, Malla $entity)
    {
        return $this->putAction($request, $codiPfg, $entity);
    }
    /**
     * Delete a Malla entity.
     *
     * @View(statusCode=204)
     * @ApiDoc()
     *
     * @param Request $request
     * @param $codiPfg
     * @param $entity
     * @internal param $id
     *
     * @return Response
     */
    public function deleteAction(Request $request, $codiPfg, Malla $entity)
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
     * Get all PFG/Malla/Alumnos entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     * @ApiDoc()
     *
     * @param $codiPfg
     * @param $codiMalla
     *
     * @return Response
     */
    public function getAlumnosAction($codiPfg, $codiMalla)
    {
        $em = $this->getDoctrine()->getManager();

        $results = $em->getRepository('CipeeBundle:Malla')
                      ->findByAlmn($codiPfg, $codiMalla);

        if ($results) {
            return array('recordsTotal' => count($results), 'records' => $results);
        }

        return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
    }
}
