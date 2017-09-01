<?php
namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
class ContactType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', TextType::class, array(
            'label' => 'NOM*',
            'attr' => ['class' => 'form-control input-lg', 'data-parsley-length' => '[3, 20]',]
      ))
      ->add('email', TextType::class, array(
            'label' => 'MAIL*',
            'attr' => ['class' => 'form-control input-lg', 'data-parsley-type' => 'email',]
      ))
      ->add('subject', TextType::class, array(
            'label' => 'OBJET*',
            'attr' => ['class' => 'form-control input-lg','data-parsley-length' => '[3, 255]',]
      ))
      ->add('message', TextareaType::class, array(
            'label' => 'MESSAGE*',
            'attr' => ['class' => 'form-control input-lg',]
      ))
       ->add('save', SubmitType::class, array(
            'label' => 'ENVOYER',
            'attr' => ['class' => 'btn btn-primary btn-lg btn-standard',]
      ));
  }
  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'AppBundle\Entity\Contact'
    ));
  }
}