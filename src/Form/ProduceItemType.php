<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\ProduceItem;
use App\Entity\Icon;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduceItemType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextareaType::class)
            ->add('expirationDate', DateType::class)
//            ->add('icon', ChoiceType::class, array(
//                'choices' => array(
//                    '1' => null,
//                    '2' => true,
//                    '3' => false,
//                ),
//            ))

            ->add('icon', ChoiceType::class, [
                'choices' => [
                    new Icon('carrot', '/../public/uploads/carrot.svg'),
                    new Icon('cheese', '/../public/uploads/cheese.svg'),
                    new Icon('steak', '/../public/uploads/steak.svg'),
                ],
                'choice_label' => function ($icon, $iconName, $iconImage) {
                    return strtoupper($icon->getIconName());
                },
                'choice_attr' => function($icon, $iconName, $iconImage) {
                    return [
                        'class' => 'icon_'.strtolower($icon->getIconName()),
                        'class' => 'icon_'.$icon->getIconImage()
                        ];
                },

                'group_by' =>function($icon, $iconName, $iconImage) {
                    return rand(0, 1) == 1 ? 'Group A' : 'Group B';
                },
                'preferred_choices' => function($icon, $iconName, $iconImage) {
                    return $icon->getIconName() == 'cheese' || $icon->getIconName() == 'steak';
                },
            ])

            ->add('save', SubmitType::class, ['label' => 'Create new Produce Item']);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(['data_class' => ProduceItem::class]);
    }

}