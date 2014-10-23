<?php

namespace Slackiss\Bundle\SocialBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="welcome")
     * @Template()
     * @Method({"GET"})
     */
    public function indexAction()
    {
        $param['index1'] = rand(1,34);
        $param['index2'] = rand(1,34);
        $param['index3'] = rand(1,34);
        $param['index4'] = rand(1,34);
        return $param;
    }
}
