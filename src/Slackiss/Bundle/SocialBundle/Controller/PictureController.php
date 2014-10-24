<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Slackiss\Bundle\SocialBundle\Entity\Picture;
use Slackiss\Bundle\SocialBundle\Form\PictureType;

/**
 * Resource controller.
 *
 * @Route("/social/picture")
 */
class PictureController extends Controller
{

    /**
     *
     * @Route("/", name="avshare_picture")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Picture');
        $query = $repo->createQueryBuilder('r')
                      ->orderBy('r.id','desc')
                      ->getQuery();
        $page = $request->query->get('page',1);
        $entities = $this->get('knp_paginator')->paginate($query,$page,2);

        $picture = new Picture();
        $form = $this->createPictureForm($picture);
        return array(
            'form'      =>$form->createView(),
            'nav_active'=>'picture',
            'entities' => $entities,
        );
    }

    protected function createPictureForm($picture)
    {
        $formType = new PictureType();
        $form = $this->createForm($formType,$picture,[
            'action'=>$this->generateUrl('avshare_picture_upload'),
            'method'=>'POST'
        ]);
        return $form;
    }

    /**
     *
     * @Route("/upload", name="avshare_picture_upload")
     * @Method("POST")
     * @Template()
     */
    public function uploadAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Picture');
        $query = $repo->createQueryBuilder('r')
                      ->orderBy('r.id','desc')
                      ->getQuery();
        $page = $request->query->get('page',1);
        $entities = $this->get('knp_paginator')->paginate($query,$page,20);

        $picture = new Picture();
        $form = $this->createPictureForm($picture);
        $form->handleRequest($request);
        if($form->isValid()){
            $current = $this->get('security.context')->getToken()->getUser();
            $picture->setMember($current);
            $em->persist($picture);
            $em->flush();
            return $this->redirect($this->generateUrl('avshare_picture'));
        }
        return array(
            'form'      =>$form->createView(),
            'nav_active'=>'picture',
            'entities' => $entities,
        );
    }

    /**
     *
     * @Route("/{id}/show", name="avshare_picture_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:Picture');
        $entity = $repo->find($id);

        if(!$entity){
            throw $this->createNotFoundException('没有这个图片');
        }
        $response = new Response();
        $file = $entity->getPictureAttach();
        $response->headers->set('Content-Type', $file->getMimeType());
        $response->setStatusCode(200);
        $response->setContent(file_get_contents($file));
        return $response;
    }
}
