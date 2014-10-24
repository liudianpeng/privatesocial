<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Slackiss\Bundle\SocialBundle\Entity\MemberProfile;
use Slackiss\Bundle\SocialBundle\Form\MemberProfileType;

/**
 * @Route("/social/profile")
 */
class ProfileController extends Controller
{

    /**
     * @Route("/",name="profile_edit")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $param =  array();
        $em = $this->getDoctrine()->getManager();
        $current = $this->get('security.context')->getToken()->getUser();
        if(!$current->getMemberProfile()){
            $memberProfile = new MemberProfile();
            $memberProfile->setNickname($current->getUsername());
            $memberProfile->setMember($current);
            $current->setMemberProfile($memberProfile);
            $em->persist($memberProfile);
            $em->persist($current);
            $em->flush();
        }
        $form = $this->getForm($current->getMemberProfile());
        $param['form'] = $form->createView();
        return $param;
    }

    /**
     * @Route("/update",name="profile_update")
     * @Method({"PUT"})
     * @Template("SlackissSocialBundle:Profile:index.html.twig")
     */
    public function updateAction(Request $request)
    {
        $param =  array();
        $em = $this->getDoctrine()->getManager();
        $current = $this->get('security.context')->getToken()->getUser();
        if(!$current->getMemberProfile()){
            $memberProfile = new MemberProfile();
            $memberProfile->setNickname($current->getUsername());
            $memberProfile->setMember($current);
            $current->setMemberProfile($memberProfile);
            $em->persist($memberProfile);
            $em->persist($current);
            $em->flush();
        }
        $profile = $current->getMemberProfile();
        $form = $this->getForm($profile);
        $form->handleRequest($request);
        if($form->isValid()){
            $em->persist($profile);
            $em->flush();
            return $this->redirect($this->generateUrl('profile_edit'));
        }
        $param['form'] = $form->createView();
        return $param;
    }

    protected function getForm($profile)
    {
        $type = new MemberProfileType();
        $form = $this->createForm($type,$profile,[
            'method'=>'PUT',
            'action'=>$this->generateUrl('profile_update')
        ]);
        return $form;
    }
}
