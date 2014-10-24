<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Slackiss\Bundle\SocialBundle\Entity\Timeline;
use Slackiss\Bundle\SocialBundle\Form\TimelineType;

/**
 * @Route("/social/timeline")
 */
class TimelineController extends Controller
{

    /**
     * @Route("/",name="timeline")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $param = $this->getData($request);
        $timeline = new Timeline();
        $form     = $this->getForm($timeline);
        $param['form'] = $form->createView();
        return $param;
    }

    /**
     * @Route("/create",name="timeline_create")
     * @Method({"POST","GET"})
     * @Template("SlackissSocialBundle:Timeline:index.html.twig")
     */
    public function createAction(Request $request)
    {
        if($request->isMethod('GET')){
            return $this->redirect($this->generateUrl('timeline'));
        }

        $param = $this->getData($request);
        $timeline = new Timeline();
        $form     = $this->getForm($timeline);
        $em = $this->getDoctrine()->getManager();
        $current = $this->get('security.context')->getToken()->getUser();
        $form->handleRequest($request);
        if($form->isValid()){
            $content = $timeline->getContent();
            if(empty($content)){
                return $this->redirect($this->generateUrl('timeline'));
            }
            $timeline->setMember($current);
            $em->persist($timeline);
            $em->flush();
            return $this->redirect($this->generateUrl('timeline'));
        }
        $param['form'] = $form->createView();
        return $param;
    }

    protected function getData($request)
    {
        $param =  ['nav_active'=>'timeline'];
        $em    = $this->getDoctrine()->getManager();
        $repo  = $em->getRepository('SlackissSocialBundle:Timeline');
        $page  = $request->query->get('page',1);
        $query = $repo->createQueryBuilder('t')
                      ->where('t.status = true')
                      ->orderBy('t.id','desc')
                      ->getQuery();
        $entities = $this->get('knp_paginator')->paginate($query,$page,100);
        $param['entities'] = $entities;
        return $param;
    }

    protected function getForm($timeline)
    {
        $type = new TimelineType();
        return $this->createForm($type,$timeline,[
            'method'=>'POST',
            'action'=>$this->generateUrl('timeline_create')
        ]);
    }
}
