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
 * @Route("/admin/member")
 */
class MemberController extends Controller
{

    /**
     *
     * @Route("/", name="avshare_admin_member")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $request->query->get('page',1);
        $repo = $em->getRepository('SlackissSocialBundle:Member');
        $entities = $repo->findAll();

        return array(
            'nav_active'=>'admin_member',
            'entities' => $entities,
        );
    }
}
