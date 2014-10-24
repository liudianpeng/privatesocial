<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Slackiss\Bundle\SocialBundle\Entity\Resource;
use Slackiss\Bundle\SocialBundle\Form\ResourceType;

/**
 * Resource controller.
 *
 * @Route("/social/resource")
 */
class ResourceController extends Controller
{

    /**
     *
     * @Route("/", name="social_resource_list")
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
            'nav_active'=>'resource',
            'entities' => $entities,
        );
    }

    /**
     *
     * @Route("/{id}/show", name="social_resource_show")
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
            'nav_active'=>'resource',
            'entity' => $entity,
        );
    }

    /**
     *
     * @Route("/{id}/pic", name="social_resource_pic_show")
     * @Method("GET")
     * @Template()
     */
    public function picAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Resource');
        $entity = $repo->find($id);

        if(!$entity){
            throw $this->createNotFoundException('没有这个图片');
        }
        $response = new Response();
        $file = $entity->getFaceAttach();
        $response->headers->set('Content-Type', $file->getMimeType());
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$this->getFileName(md5($entity->getId()), $file->guessExtension()).'"');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        $response->setStatusCode(200);
        $response->setContent(file_get_contents($file));
        return $response;
    }

    protected function getFileName($name, $mimeType)
    {
        return $name.'.'.$mimeType;
    }

}
