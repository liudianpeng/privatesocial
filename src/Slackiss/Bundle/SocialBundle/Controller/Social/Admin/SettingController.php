<?php

namespace Slackiss\Bundle\SocialBundle\Controller\Social\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/admin/setting")
 */
class SettingController extends Controller
{

    /**
     * @Route("/",name="social_admin_setting")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $param =  array('nav_active'=>'admin_setting');
        $optionService = $this->get('slackiss_social.option');
        $ann    = $optionService->get('announcement');
        $footer = $optionService->get('footer');
        $param['announcement'] = $ann;
        $param['footer']       = $footer;
        return $param;
    }

    /**
     * @Route("/update",name="social_admin_setting_update")
     * @Method({"POST"})
     * @Template()
     */
    public function updateAction(Request $request)
    {
        $param =  array();
        $optionService = $this->get('slackiss_social.option');
        $announcement  = $request->request->get('announcement');
        $footer        = $request->request->get('footer');
        $optionService->set('announcement',$announcement);
        $optionService->set('footer',$footer);
        return $this->redirect($this->generateUrl('social_admin_setting'));
    }



}
