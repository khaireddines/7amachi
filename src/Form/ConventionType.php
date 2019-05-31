<?php

namespace App\Form;

use App\Entity\Convention;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Investisseur;
use App\Entity\Project;

class ConventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Date_Debut')
            ->add('CodeP',EntityType::class,[
            'class' => Project::class,
            'choice_label' => 'LibelleP',
            ])
            ->add('Mat',EntityType::class,[
            'class' => Investisseur::class,
            'choice_label' => 'NomSociete',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Convention::class,
        ]);
    }
}
