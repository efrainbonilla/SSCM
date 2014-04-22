<?php

namespace SSCM\SadminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SSCM\SadminBundle\Util\Utility;
use SSCM\SadminBundle\Entity\ListPais;
use SSCM\SadminBundle\Form\ListPaisType;

use FOS\RestBundle\View\View as FOSView;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Voryx\RESTGeneratorBundle\Controller\VoryxController;

/**
 * ListPais controller.
 * @RouteResource("region")
 */
class ListPaisRESTController extends VoryxController
{
    /**
     * Get a ListPais entity
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function getAction(ListPais $entity)
    {
        return $entity;
    }

    /**
     * Get all ListPais entities.
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
     * @QueryParam(name="data_records", nullable=true, description="Filter by fields.")
     * @QueryParam(name="query_count", nullable=true, description="Filter by fields.")
     * @QueryParam(name="total_count", nullable=true, description="Filter by fields.")
     *
     */
    public function cgetAction(ParamFetcherInterface $paramFetcher)
    {
        try {
            $offset = $paramFetcher->get('offset');
            $limit = $paramFetcher->get('limit');
            $order_by = $paramFetcher->get('order_by');
            $filters = !is_null($paramFetcher->get('filters')) ? $paramFetcher->get('filters') : array();
            
            $data_records = $paramFetcher->get('data_records');
            $query_count = $paramFetcher->get('query_count');
            $total_count = $paramFetcher->get('total_count');

            $orderBy = $criteria = array();

            if (is_array($order_by)) {
                foreach ($order_by as $key => $value)
                    $orderBy[ Utility::camelCase($key) ] = ($value == -1) ? 'DESC' : 'ASC' ;

                $order_by = $orderBy;
            }
            if (is_array($filters)) {
                foreach ($filters as $key => $value)
                    $criteria['nombPais'] = $value;

                $filters = $criteria;
            }

            $em = $this->getDoctrine()->getManager();
            $entities = $em->getRepository('SadminBundle:ListPais')->findBy($filters, $order_by, $limit, $offset);
            if ($entities) {
                $resp = array();
                 if ($data_records) $resp[$data_records] = $entities;
                 if ($query_count) $resp[$query_count] = 22;
                 if ($total_count) $resp[$total_count] = count( $entities );

                return ($data_records) ? $resp : $entities;

            } else {
                return FOSView::create('Not Found', Codes::HTTP_NO_CONTENT);
            }
        } catch (\Exception $e) {
            return FOSView::create($e->getMessage(), Codes::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Create a ListPais entity.
     *
     * @View(statusCode=201, serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function postAction(Request $request)
    {

        $entity = new ListPais();
        $form = $this->createForm(new ListPaisType(), $entity, array("method" => $request->getMethod()));
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
     * Update a ListPais entity.
     *
     * @View(serializerEnableMaxDepthChecks=true)
     *
     * @param Request $request
     * @param $entity
     * @return \Symfony\Component\HttpFoundation\Response
     *
     *
     */
    public function putAction(Request $request, ListPais $entity)
    {

        try {
            $em = $this->getDoctrine()->getManager();
            $request->setMethod('PATCH'); //Treat all PUTs as PATCH
            $form = $this->createForm(new ListPaisType(), $entity, array("method" => $request->getMethod()));
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
    * Partial Update to a ListPais entity.
    *
    * @View(serializerEnableMaxDepthChecks=true)
    *
    * @param Request $request
    * @param $entity
    * @return \Symfony\Component\HttpFoundation\Response
    *
*
    */
    public function patchAction(Request $request, ListPais $entity)
    {

        return $this->putAction($request, $entity);



    }

    /**
     * Delete a ListPais entity.
     *
     * @View(statusCode=204)
     *
     * @param Request $request
     * @param $entity
     * @internal param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function deleteAction(Request $request, ListPais $entity)
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
