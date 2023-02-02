<?php

namespace App\Form;

use App\Form\ContactModel;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Component\Validator\Constraints\EmailValidator;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('subject', TextType::class, [
                'invalid_message' => 'Not good subject',
                'required' => true,
                'empty_data' => 'DATA'                           
            ])
            ->add('message', TextareaType::class, [
                'invalid_message' => 'Not good message',
                'required' => true,
                'empty_data' => 'DATA' 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactModel::class,
        ]);
    }
}
?>