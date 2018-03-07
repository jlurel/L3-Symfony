<?php
/**
 * Created by PhpStorm.
 * User: Katsuo
 * Date: 06/03/2018
 * Time: 02:30
 */

namespace AppBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;

use FOS\UserBundle\Event\FormEvent;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class RegistrationListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess (FormEvent $formEvent) {
        $user = $formEvent->getForm()->getData();
    }
}