<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\ProduceItem;
use App\Entity\Icon;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ProduceItemType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextareaType::class)
            ->add('expirationDate', DateType::class)
            ->add('icon', EntityType::class, [
                'class' => Icon::class,
                'choice_label' => 'iconName'
            ])
            ->add('uploadIcon', ButtonType::class, ['label' => 'Upload new Icon'])
            ->add('save', SubmitType::class, ['label' => 'Create new Produce Item']);

//            ->add('icon', ChoiceType::class, [
//                'choices' => [
//                    new Icon('carrot', '<html><body><img src="/../public/uploads/carrot.svg"/></body></html>'),
//                    new Icon('cheese', '<html><body><img src="/../public/uploads/cheese.svg"/></body></html>'),
//                    new Icon('steak', '<html><body><img src="/../public/uploads/steak.svg"/></body></html>'),
//                ],
//                'choice_label' => function ($icon, $iconName, $iconImage) {
//                    //return strtoupper($icon->getIconName());
//                    return $icon->getIconName();
//                },
//                'choice_attr' => function($icon, $iconName, $iconImage) {
//                    return [
//                        'class' => 'icon_'.strtolower($icon->getIconName()),
//                        'class' => 'icon_'.$icon->getIconImage()
//                        ];
//                },
//
//                'preferred_choices' => function($icon, $iconName, $iconImage) {
//                    return $icon->getIconName() == 'cheese' || $icon->getIconName() == 'steak';
//                },
//            ])
//

}

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => ProduceItem::class]);
    }
}
