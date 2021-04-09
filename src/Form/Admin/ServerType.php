<?php

namespace App\Form\Admin;

use App\Entity\Admin\Server;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('cfgProc')
            ->add('cfgMem')
            ->add('cfgDrive')
            ->add('ResInt')
            ->add('resExt')
            ->add('ResMac')
            ->add('ResUrl')
            ->add('Role')
            ->add('os')
            ->add('portSsh')
            ->add('portFtp')
            ->add('contrat')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Server::class,
            'translation_domain' => 'server'
        ]);
    }
}
