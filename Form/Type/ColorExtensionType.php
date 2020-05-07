<?php

namespace GaylordP\ColorBundle\Form\Type;

use GaylordP\ColorBundle\Entity\Color;
use GaylordP\ColorBundle\Repository\ColorRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorExtensionType extends AbstractType
{
    private $colors;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->colors = $colorRepository->findAll();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => Color::class,
            'label' => 'label.color',
            'attr' => [
                'class' => 'form-color-row',
            ],
            'translation_domain' => 'color',
            'label_attr' => [
                'class' => 'radio-custom radio-inline',
            ],
            'choices' => $this->colors,
            'expanded' => true,
            'choice_label' => false,
            'choice_translation_domain' => false,
            'ico' => 'fas fa-paint-brush',
        ]);
    }

    public function getParent()
    {
        return EntityType::class;
    }
}
