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
            ->add('cfgProc', ChoiceType::class, [
                'choices' => [
                    '1 coeur' => 1,
                    '2 coeurs' => 2,
                    '4 coeurs' => 3,
                ],
            ])
            ->add('cfgMem', ChoiceType::class, [
                'choices' => [
                    '1Gb' => 1,
                    '2Gb' => 2,
                    '4GB' => 3,
                ],
            ])
            ->add('cfgDrive', ChoiceType::class, [
                'choices' => [
                    '20Gb' => 20,
                    '50Gb' => 50,
                    '100GB' => 100,
                    '200GB' => 200,
                ],
            ])
            ->add('ResInt')
            ->add('resExt')
            ->add('ResMac')
            ->add('ResUrl')
            ->add('Role')
            ->add('os', ChoiceType::class, [
                'choices' => [
                    'Ubuntu 20.04' => 'Ubuntu 20.04',
                    'Windows 10' => 'Windows 10',
                    'Windows 7' => 'Windows 7',
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
