<?php

namespace App\Form;

use App\Entity\Cancion;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuscarFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, [
                'required' => false,
                'label' => 'Nombre'
            ])
            ->add('artista', TextType::class, [
                'required' => false,
                'label' => 'Artista'
            ])
            ->add('ano', IntegerType::class, [
                'required' => false,
                'label' => 'Año'
            ])
            ->add('album', TextType::class, [
                'required' => false,
                'label' => 'Álbum'
            ])
            ->add('buscar', SubmitType::class, [
                'label' => 'Buscar'
            ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cancion::class,
        ]);
    }
}
