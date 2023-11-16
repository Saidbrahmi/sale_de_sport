<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Equipement;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NomEquipement')
            ->add('Quantite')
            ->add('DateAchat')
            ->add('PrixAchat')
            ->add('IdCategorie' , EntityType::class, [
                'class' => Categorie::class ,
                'choice_label' => 'NomCategorie' ,
                'multiple' => false ,
                'expanded' => false ,
            ])
            ->add('idUser' , EntityType::class, [
                'class' => User::class ,
                'choice_label' => 'Nom' ,
                'multiple' => false ,
                'expanded' => false ,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipement::class,
        ]);
    }
}
