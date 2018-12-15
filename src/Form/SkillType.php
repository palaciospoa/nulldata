<?php

declare(strict_types = 1);

namespace App\Form;

use App\Entity\Employee;
use App\Entity\EmployeeSkills;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

final class SkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('skillName',TextType::class
                ,['label'=>'form.skill.name']
            )
            ->add('skillLevel',NumberType::class
                ,['label'=>'form.skill.level',
                  'constraints' => [
                      new Length(['min' => 1]),
                      new Length(['max' => 5]),
                      ]
                  ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => EmployeeSkills::class,
            ]
        );
    }

}