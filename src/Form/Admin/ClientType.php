<?php

namespace App\Form\Admin;

use App\Entity\Admin\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName')
            ->add('firstName')
            ->add('address')
            ->add('city')
            ->add('zipcode')
            ->add('email')
            ->add('phoneDesk')
            ->add('imageFile', VichFileType::class, [
                'required' => false
            ])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
            'translation_domain' => 'client'
        ]);
    }
}
