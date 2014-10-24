<?php

namespace Slackiss\Bundle\SocialBundle\Service;

use Symfony\Component\HttpKernel\Kernel;
use Slackiss\Bundle\SocialBundle\Entity\Option;

class OptionService {

    protected $em;
    protected $repo;

    public function __construct($em)
    {
        $this->em   = $em;
        $this->repo= $this->em->getRepository('SlackissSocialBundle:Option');
    }

    public function set($key, $content)
    {
        $option = $this->getOption($key);
        if(!$option){
            $option = new Option();
            $option->setName($key);
        }
        $option->setContent($content);
        $this->em->persist($option);
        $this->em->flush();
    }

    public function get($key)
    {
        $option = $this->getOption($key);
        if($option){
            return $option->getContent();
        }else{
            return '';
        }
    }

    public function getOption($key)
    {
        return $this->repo->findOneBy(['name'=>$key]);
    }
}
