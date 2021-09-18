<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Provider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('prix')
            ->add('quantity')
            ->add('provider',EntityType::class, [
                // looks for choices from this entity
                'class' => Provider::class,
        
                // uses the Provider.username property as the visible option string
                'choice_label' => 'name',
                'placeholder' => 'choose'
        
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
