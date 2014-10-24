<?php

namespace Slackiss\Bundle\SocialBundle\Controller\Social\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Slackiss\Bundle\SocialBundle\Entity\Resource;
use Slackiss\Bundle\SocialBundle\Form\ResourceType;

/**
 * Resource controller.
 *
 * @Route("/admin/resource")
 */
class ResourceController extends Controller
{

    /**
     * Lists all Resource entities.
     *
     * @Route("/", name="avshare_admin_resource")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $request->query->get('page',1);
        $repo = $em->getRepository('SlackissSocialBundle:Resource');
        $query = $repo->createQueryBuilder('r')
        ->orderBy('r.id','desc')
        ->getQuery();
        $entities = $this->get('knp_paginator')->paginate($query,$page,20);
        //$entities = $repo->findAll();

        return array(
            'nav_active'=>'admin_resource',
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Resource entity.
     *
     * @Route("/", name="avshare_admin_resource_create")
     * @Method("POST")
     * @Template("SlackissSocialBundle:Resource:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Resource();
        $current = $this->get('security.context')->getToken()->getUser();
        $entity->setMember($current);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('avshare_admin_resource_show', array('id' => $entity->getId())));
        }

        return array(
            'nav_active'=>'admin_resource',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Resource entity.
    *
    * @param Resource $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Resource $entity)
    {
        $form = $this->createForm(new ResourceType(), $entity, array(
            'action' => $this->generateUrl('avshare_admin_resource_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => '保存','attr'=>[
            'class'=>'btn btn-primary'
        ]));

        return $form;
    }

    /**
     * Displays a form to create a new Resource entity.
     *
     * @Route("/new", name="avshare_admin_resource_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Resource();
        $current = $this->get('security.context')->getToken()->getUser();
        $entity->setMember($current);
        $form   = $this->createCreateForm($entity);

        return array(
            'nav_active'=>'admin_resource',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Resource entity.
     *
     * @Route("/{id}", name="avshare_admin_resource_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlackissSocialBundle:Resource')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('找不到这个资源');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'nav_active'=>'admin_resource',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Resource entity.
     *
     * @Route("/{id}/edit", name="avshare_admin_resource_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlackissSocialBundle:Resource')->find($id);
        $current = $this->get('security.context')->getToken()->getUser();
        $entity->setMember($current);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Resource entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'nav_active'=>'admin_resource',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Resource entity.
    *
    * @param Resource $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Resource $entity)
    {
        $form = $this->createForm(new ResourceType(), $entity, array(
            'action' => $this->generateUrl('avshare_admin_resource_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => '更新','attr'=>[
            'class'=>'btn btn-primary'
        ]));

        return $form;
    }
    /**
     * Edits an existing Resource entity.
     *
     * @Route("/{id}", name="avshare_admin_resource_update")
     * @Method("PUT")
     * @Template("SlackissSocialBundle:Resource:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SlackissSocialBundle:Resource')->find($id);
        $current = $this->get('security.context')->getToken()->getUser();
        $entity->setMember($current);
        if (!$entity) {
            throw $this->createNotFoundException('找不到这个资源.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('avshare_admin_resource_edit', array('id' => $id)));
        }

        return array(
            'nav_active'=>'admin_resource',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Resource entity.
     *
     * @Route("/{id}", name="avshare_admin_resource_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SlackissSocialBundle:Resource')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Resource entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('avshare_admin_resource'));
    }

    /**
     * Creates a form to delete a Resource entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('avshare_admin_resource_delete', array('id' => $id)))
            ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => '删除','attr'=>[
                        'class'=>'btn btn-danger'
                    ]))
            ->getForm()
        ;
    }
}
