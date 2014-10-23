<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

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
 * @Route("/avshare/list")
 */
class ListController extends Controller
{

    /**
     *
     * @Route("/", name="avshare_list")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Resource');
        $query = $repo->createQueryBuilder('r')
                      ->orderBy('r.id','desc')
                      ->getQuery();
        $page = $request->query->get('page',1);
        $entities = $this->get('knp_paginator')->paginate($query,$page,20);

        return array(
            'nav_active'=>'list',
            'entities' => $entities,
        );
    }

    /**
     *
     * @Route("/{id}/show", name="avshare_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Resource');
        $entity = $repo->find($id);

        if(!$entity){
            throw $this->createNotFoundException('没有这个资源');
        }

        return array(
            'nav_active'=>'list',
            'entity' => $entity,
        );
    }
}
