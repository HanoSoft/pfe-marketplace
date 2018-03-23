<?php
/**
 * Created by PhpStorm.
 * User: nouha
 * Date: 23/03/2018
 * Time: 15:09
 */

namespace AdminBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\OptionsResolver\OptionsResolver;



class BrandType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description',CKEditorType::class);

    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Brand'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'corebundle_brand';
    }


}
