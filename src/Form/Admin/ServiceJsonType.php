<?php

namespace App\Form\Admin;

use App\Entity\Admin\Client;
use App\Entity\Admin\Server;
use App\Entity\Admin\Service;
use App\Entity\Admin\TypeServ;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceJsonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('service', EntityType::class, [
                    'class' => TypeServ::class,
                    'choice_label' => 'name',
                    'multiple' => false
                ]
            )
            ->add('client', EntityType::class, [
                    'class' => Client::class,
                    'choice_label' => 'nameSociety',
                    'multiple' => false
                ]
            )
            ->add('servers', EntityType::class, [
                    'class' => Server::class,
                    'choice_label' => 'name',
                    'multiple' => false
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
            'translation_domain' => 'service'
        ]);
    }
}
