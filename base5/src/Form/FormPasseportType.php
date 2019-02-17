<?php

namespace App\Form;

use App\Entity\Lot;
use App\Entity\Passeport;
use App\Entity\Observation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class FormPasseportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_demandeur')
            ->add('prenom_demandeur')
                    
            ->add('montant') 
                  
            ->add('observation', EntityType::class, [
                'class' => Observation::class,
                'choice_label' => 'libelle'             
            ])           
            ->add('lot', EntityType::class,  [ 
                'class' => Lot::class,            
                'choice_label' => 'num_lot'             
            ])          
            ->add('date', DateType::class, [
                //date_export
                // renders it as a single text box (source: symfony.com/doc/current/reference/forms/types/date.html)
                'widget' => 'single_text',
            ])
            ->add('date_expedie', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('date_arrive', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('date_livre', DateType::class, [
                'widget' => 'single_text',
            ])
                
            ->add('dossier_expedie', CheckboxType::class, [
                'required' => false,
            ])
            ->add('passeport_arrive', CheckboxType::class, [
                'required' => false,
            ])
            ->add('passeport_livre', CheckboxType::class, [
                'required' => false,
            ]) 
            
             
      
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Passeport::class,
        ]);
    }
}
