<?php

declare(strict_types=1);

namespace Domain\Product\Type;

use Domain\Product\Model\ProductDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255])
                ]
            ])
            ->add('productId', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Choice(['choices' => ['xxx', 'yyy', 'zzz']])
                ]
            ])
            ->add('price', IntegerType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new GreaterThanOrEqual(['value' => 0])
                ]
            ])
            ->add('currency', TextType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 10])
                ]
            ])
            ->add('description', TextType::class, ['required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductDto::class,
        ]);
    }

}