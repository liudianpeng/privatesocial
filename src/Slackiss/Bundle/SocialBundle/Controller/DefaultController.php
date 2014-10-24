<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/",name="welcome")
     * @Template()
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect($this->generateUrl('timeline'));
        }else{
            return ['nav_active'=>'welcome'];
        }
    }

    /**
     *
     * @Route("/social/member/{id}/pic", name="social_member_avatar")
     * @Method("GET")
     */
    public function picAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SlackissSocialBundle:MemberProfile');
        $entity = $repo->find($id);

        if(!$entity){
            throw $this->createNotFoundException('没有这个图片');
        }
        $response = new Response();
        $file = $entity->getAvatarAttach();
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
