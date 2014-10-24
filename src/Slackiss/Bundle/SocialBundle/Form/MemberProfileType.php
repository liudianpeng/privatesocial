<?php

namespace Slackiss\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MemberProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nickname','text',[
                'label'=>'昵称',
                'required'=>true,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('description','textarea',[
                'label'=>'自我介绍',
                'required'=>true,
                'attr'=>[
                    'class'=>'form-control',
                    'rows'=>4
                ]
            ])
            ->add('avatarAttach',null,[
                'label'=>'头像',
                'required'=>false
            ])
            ->add('submit','submit',[
                'label'=>'保存',
                'attr'=>[
                    'class'=>'btn btn-default'
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
            'data_class' => 'Slackiss\Bundle\SocialBundle\Entity\MemberProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'slackiss_bundle_socialbundle_memberprofile';
    }
}
