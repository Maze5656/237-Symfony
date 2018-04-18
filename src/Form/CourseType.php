<?php

namespace App\Form;

use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use App\Entity\Course;
use App\Entity\Student;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CourseType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('name', TextType::class)
            ->add('students', EntityType::class, [
                'class' => Student::class,
                'choice_label' => 'first_name',
                'multiple' => true
            ])
            ->add('save', SubmitType::class, ['label' => 'Add a course']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Course::class]);
    }

}