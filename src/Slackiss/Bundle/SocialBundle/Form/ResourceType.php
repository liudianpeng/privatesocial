<?php

namespace Slackiss\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResourceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text',[
                'label'=>'标题',
                'required'=>true,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('content', 'ckeditor', array(
                'label'=>'内容',
                'attr'=>array(
                    'class'=>'form-control'
                ),
                'filebrowser_image_browse_url' => array(
                    'route'            => 'elfinder',
                    'route_parameters' => array(),
                ),
            ))
            ->add('faceAttach',null,[
                'label'=>'封面',
                'required'=>true,
                'attr'=>[
                ]
            ])
            ->add('download','text',[
                'label'=>'资源地址',
                'required'=>true,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('code','text',[
                'label'=>'资源密码',
                'required'=>true,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Slackiss\Bundle\SocialBundle\Entity\Resource'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'slackiss_bundle_avsharebundle_resource';
    }
}
