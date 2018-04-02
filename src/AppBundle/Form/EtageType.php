<?php

namespace AppBundle\Form;

use AppBundle\Entity\Batiment;
use AppBundle\Entity\Site;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numEtage')->add('site', EntityType::class, [
            'class' => 'AppBundle\Entity\Site',
            'placeholder' => 'Selectionnez le site',
            'mapped' => false,
            'required' => false
        ]);

        $formModifier = function (FormInterface $form, Site $site = null) {
            $batiments = null === $site ? array() : $site->getBatiments();

            $form->add('batiment', EntityType::class, array(
                'class' => 'AppBundle:Batiment',
                'placeholder' => 'Selectionnez le batiment',
                'choices' => $batiments,
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getBatiment());
            }
        );

        $builder->get('site')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $site = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $site);
            }
        );
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_etage';
    }


}
