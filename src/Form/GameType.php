<?php

namespace App\Form;


use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du jeu',
                'attr' => ['placeholder' => 'Entrez le nom du jeu'],
            ])
            ->add('genre', TextType::class, [
                'label' => 'Genre du jeu',
                'attr' => ['placeholder' => 'Entrez le genre du jeu'],
            ])
            ->add('platform', TextType::class, [
                'label' => 'Plateforme',
                'attr' => ['placeholder' => 'PC, Xbox, PlayStation...'],
            ])
            ->add('releaseYear', TextType::class, [
                'label' => 'Année de sortie',
                'attr' => ['placeholder' => '2024'],
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Image du jeu (webp, jpg, png)',
                'attr' => ['placeholder' => 'Entrez le nom de l\'image'],
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/webp',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Formats autorisés : .webp, .jpg, .png',
                    ]),
                ],
            ]);
            // ->add('save', SubmitType::class, ['label' => 'Ajouter']);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Game::class,
        ]);
    }
}
