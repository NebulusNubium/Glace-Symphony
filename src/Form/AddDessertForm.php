<?php

namespace App\Form;

use App\Entity\Cone;
use App\Entity\Glace;
use Annotation as Vich;
use App\Entity\Toppings;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Mapping\Annotation;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AddDessertForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('ingredientSpecial')
            ->add('cone', EntityType::class, [
                'class' => Cone::class,
                'choice_label' => 'ConeType',
            ])
            ->add('topping', EntityType::class, [
                'class' => Toppings::class,
                'choice_label' => 'toppingType',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'mapped' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPEG, PNG, GIF).',
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Glace::class,
        ]);
    }
}
