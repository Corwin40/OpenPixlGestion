<?php

namespace App\Form\Admin;

use App\Entity\Admin\Server;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('os', ChoiceType::class, [
                'choices' => [
                    'Ubuntu 20.04' => true,
                    'Windows 10' => true,
                    'Windows 7' => true,
                ],
            ])
            ->add('portSsh')
            ->add('portFtp')
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
