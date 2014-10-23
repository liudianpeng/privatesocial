<?php

namespace Slackiss\Bundle\SocialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PictureType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pictureAttach',null,[
                'label'=>'选择并上传',
                'required'=>true
            ])
            ->add('description','textarea',[
                'label'=>'照片说明',
                'required'=>false,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('submit','submit',[
                'label'=>'上传',
                'attr'=>[
                    'class'=>'btn btn-default',
                    'style'=>'margin-top:10px'
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
            'data_class' => 'Slackiss\Bundle\SocialBundle\Entity\Picture'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'slackiss_bundle_avsharebundle_picture';
    }
}
