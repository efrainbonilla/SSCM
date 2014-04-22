<?php

namespace SSCM\SadminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SSCM\SadminBundle\Entity\ListCvoto;
use SSCM\SadminBundle\Form\ListCvotoType;

use FOS\RestBundle\View\View as FOSView;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Voryx\RESTGeneratorBundle\Controller\VoryxController;

/**
 * ListCvoto controller.
 * @RouteResource("cvoto")
 */
class ListCvotoRESTController extends VoryxController
{
    /**
     * Get a ListCvoto entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function getAction(ListCvoto $entity)
    {
        return $entity;
    }

    /**
     * Get all ListCvoto entities.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing notes.")
     * @QueryParam(name="limit", requirements="\d+", default="20", description="How many notes to return.")
     * @QueryParam(name="order_by", nullable=true, array=true, description="Order by fields. Must be an array ie. &order_by[name]=ASC&order_by[description]=DESC")
     * @QueryParam(name="filters", nullable=true, array=true, description="Filter by fields. Must be an array ie. &filters[id]=3")
     *
     */
    public function cgetAction(ParamFetcherInterface $paramFetcher)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('SadminBundle:ListCvoto')->findBy($filters, $order_by, $limit, $offset);
            if ($entities) {
                return $entities;
            } else {
                return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
            }
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create a ListCvoto entity.
     *
     * @View(statusCode=201, serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function postAction(Request $request)
    {

        $entity = new ListCvoto();
        $form = $this->createForm(new ListCvotoType(), $entity, array("method" => $request->getMethod()));
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
     * Update a ListCvoto entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     * @return \Symfony\Component\HttpFoundation\Response
     *
     *
     */
    public function putAction(Request $request, ListCvoto $entity)
    {

        try {
            $em = $this->getDoctrine()->getManager();
            $request->setMethod('PATCH'); //Treat all PUTs as PATCH
            $form = $this->createForm(new ListCvotoType(), $entity, array("method" => $request->getMethod()));
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
    * Partial Update to a ListCvoto entity.
    *
    * @View(serializerEnableMaxDepthChecks=true)
    *
    * @param Request $request
    * @param $entity
    * @return \Symfony\Component\HttpFoundation\Response
    *
*
    */
    public function patchAction(Request $request, ListCvoto $entity)
    {

        return $this->putAction($request, $entity);



    }

    /**
     * Delete a ListCvoto entity.
     *
     * @View(statusCode=204)
     *
     * @param Request $request
     * @param $entity
     * @internal param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function deleteAction(Request $request, ListCvoto $entity)
    {

        try {
            $em = $this->getDoctrine()->getManager();
            $em->merge($entity);
            $em->remove($entity);
            $em->flush();

            return null;
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }

    }




}
