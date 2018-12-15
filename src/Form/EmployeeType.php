<?php

declare(strict_types = 1);

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,['label'=>'form.employee.name'])
            ->add('email',TextType::class,['label'=>'form.employee.email'])
            ->add('job',TextType::class,['label'=>'form.employee.job'])
            ->add('birthDate',DateType::class,['label'=>'form.employee.birthDate'])
            ->add('domicile',TextType::class,['label'=>'form.employee.domicile'])
//            ->add('skills',TextType::class,['label'=>'form.employee.skills'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Employee::class,
            ]
        );
    }

}