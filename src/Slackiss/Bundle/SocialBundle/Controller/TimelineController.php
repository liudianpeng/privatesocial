<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $param =  ['nav_active'=>'timeline'];

        return $param;
    }
}
