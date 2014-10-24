<?php

namespace Slackiss\Bundle\SocialBundle\Controller\Social\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Slackiss\Bundle\SocialBundle\Entity\Member;
use Slackiss\Bundle\SocialBundle\Form\MemberType;

/**
 * Resource controller.
 *
 * @Route("/admin/member")
 */
class MemberController extends Controller
{
    /**
     * Lists all Member entities.
     *
     * @Route("/", name="social_member_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $param = ['nav_active'=>'admin_member'];
        $repo = $em->getRepository('SlackissSocialBundle:Member');
        $query = $repo->createQueryBuilder('s')
                      ->orderBy('s.id','desc')
                      ->getQuery();
        $page = $request->query->get('page',1);
        $entities = $this->get('knp_paginator')->paginate($query,$page,50);
        $param['entities'] = $entities;
        return $param;
    }
    /**
     * Creates a new Member entity.
     *
     * @Route("/", name="social_member_create")
     * @Method("POST")
     * @Template("SlackissSocialBundle:Social/Admin/Member:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $param = ['nav_active'=>'admin_member'];
        $userManager = $this->get('fos_user.user_manager');
        $member = $userManager->createUser();
        $form = $this->getNewForm($member);
        $form->handleRequest($request);
        if($form->isValid()){
            if(!$member->hasRole('ROLE_USER')){
                $member->addRole('ROLE_USER');
            }

            $userManager->updateUser($member);
            $this->get('session')->getFlashBag()->add('success','创建成功');
            return $this->redirect($this->generateUrl('social_member_list'));
        }
        $param['entity'] = $member;
        $param['form']   = $form->createView();
        return $param;

    }

    /**
     * Creates a form to create a Member entity.
     *
     * @param Member $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function getNewForm($member)
    {
        $type = new MemberType();
        $form = $this->createForm($type,$member,[
            'method'=>'POST',
            'action'=>$this->generateUrl('social_member_create')
        ]);
        return $form;

    }

    /**
     * Displays a form to create a new Member entity.
     *
     * @Route("/new", name="social_member_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $param = ['nav_active'=>'admin_member'];
        $userManager = $this->get('fos_user.user_manager');
        $member = $userManager->createUser();
        $em = $this->getDoctrine()->getManager();

        $form = $this->getNewForm($member);
        $param['entity'] = $member;
        $param['form']   = $form->createView();
        return $param;

    }



    /**
     * Displays a form to edit an existing Member entity.
     *
     * @Route("/{id}/edit", name="social_member_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction(Request $request,$id)
    {
        $param = ['nav_active'=>'admin_member'];
        $em = $this->getDoctrine()->getManager();
        $current = $this->get('security.context')->getToken()->getUser();

        $repo = $em->getRepository('SlackissSocialBundle:Member');
        $member = $repo->find($id);
        if($member){
            $userManager = $this->get('fos_user.user_manager');
            $member=$userManager->findUserByEmail($member->getEmail());
            if($member){
                $param['form'] = $this->getEditForm($member)->createView();
                $param['entity'] = $member;
                return $param;
            }
        }
        $this->get('session')->getFlashBag()->add('warning','没有找到这个会员');
        return $this->redirect($this->generateUrl('social_member_list'));
    }

    /**
    * Creates a form to edit a Member entity.
    *
    * @param Member $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function getEditForm($member)
    {
        $type = new MemberType(true);
        $form = $this->createForm($type,$member,[
            'method'=>'PUT',
            'action'=>$this->generateUrl('social_member_update',['id'=>$member->getId()])
        ]);
        return $form;

    }
    /**
     * Edits an existing Member entity.
     *
     * @Route("/update/{id}", name="social_member_update")
     * @Method("PUT")
     * @Template("SlackissSocialBundle:Social/Admin/Member:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $param = ['nav_active'=>'admin_member'];
        $em = $this->getDoctrine()->getManager();
        $current = $this->get('security.context')->getToken()->getUser();

        $repo = $em->getRepository('SlackissSocialBundle:Member');
        $member = $repo->find($id);
        if($member){
            $userManager = $this->get('fos_user.user_manager');
            $member=$userManager->findUserByEmail($member->getEmail());
            if($member){
                $form = $this->getEditForm($member);
                $form->handleRequest($request);
                if($form->isValid()){
                    $userManager->updateUser($member);
                    $this->get('session')->getFlashBag()->add('success','保存成功');
                    return $this->redirect($this->generateUrl('social_member_edit',['id'=>$member->getId()]));
                }
                $param['form'] = $form->createView();
                $param['entity'] = $member;
                return $param;
            }
        }
        $this->get('session')->getFlashBag()->add('warning','没有找到这个会员');
        return $this->redirect($this->generateUrl('social_member_list'));
    }
    /**
     * Deletes a Member entity.
     *
     * @Route("/delete/{id}", name="social_member_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        $param = ['nav_active'=>'admin_member'];
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Member');
        $member = $repo->find($id);
        if($member){
            $userManager = $this->get('fos_user.user_manager');
            $member = $userManager->findUserByEmail($member->getEmail());
            if($member){
                $member->setEnabled(false);
                $userManager->updateUser($member);
            }
        }
        $this->get('session')->getFlashBag()->add('success','禁用成功');
        return $this->redirect($this->generateUrl('social_member_list'));

    }

    /**
     * @Route("/enable/{id}",name="social_member_enable")
     * @Method({"GET"})
     * @Template()
     */
    public function enableAction(Request $request,$id)
    {
        $param = ['nav_active'=>'admin_member'];
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Member');
        $member = $repo->find($id);
        if($member){
            $userManager = $this->get('fos_user.user_manager');
            $member = $userManager->findUserByEmail($member->getEmail());
            if($member){
                $member->setEnabled(true);
                $userManager->updateUser($member);
            }
        }
        $this->get('session')->getFlashBag()->add('success','启用成功');
        return $this->redirect($this->generateUrl('member_list'));
    }

}
