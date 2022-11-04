<?php

namespace App\Form;

use App\Entity\Profile;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
/*             ->add('skills', ChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'Management' => '1',
                    'Communication' => '2',
                    'Git' => '3',
                    'Java' => '4',
                    'JavaScript' => '5',
                    'Python' => '6',
                    'Android' => '7',
                    'IOS' => '8',
                    'Web' => '9',
                    'App' => '10',
                    'Mobile' => '11',
                    'Windows' => '12',
                    'Linux' => '13',
                    'Unix' => '14',
                    'Bash' => '15',
                    'Crypto' => '16',
                    'English' => '17',
                    'Spanish' => '18',
                    'German' => '19',
                    'Italian' => '20',
                    'Chinese' => '21',
                    'Arabic' => '22',
                    'Polish' => '23',
                    'Oral expression' => '24',
                ],
            ]) */
            ->add('Create', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
        ]);
    }
}
