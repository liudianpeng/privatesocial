<?php

namespace Slackiss\Bundle\SocialBundle\Service;

use DateTime;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class TwigContext
{
    protected $em;
    protected $optionService;

    public function __construct(EntityManager $em,$optionService){
        $this->em = $em;
        $this->optionService = $optionService;
    }

    public function announcement()
    {
        return $this->optionService->get('announcement');
    }

    public function footer()
    {
        return $this->optionService->get('footer');
    }
}