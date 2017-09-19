<?php
/**
 * Created by PhpStorm.
 * User: dbagory
 * Date: 9/19/17
 * Time: 11:12 AM
 */
namespace ProductBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use ProductBundle\Entity\Product;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Twig\Token;

class EmailSenderProductSuscriber implements EventSubscriber
{
    protected $mailer;
    protected $tokenStorage;

    public function __construct(\Swift_Mailer $mailer, TokenStorage $tokenStorage)
    {
        $this->mailer = $mailer;
        $this->tokenStorage= $tokenStorage;
    }

    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
            'postUpdate',
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $object = $args->getEntity();

        // perhaps you only want to act on some "Product" entity
        if (!$object instanceof Product) {
            return;
        }

        $mail = $object->getuser()->getEmail();
        $message = new  \Swift_Message('produit modifié');
        $message->setBody("le produit " . $object->getTitle() . 'a été modofoé');
        $this->mailer->send($message, $mail);
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if (!$entity instanceof Product) {
            return;
        }

        $entity->setUser($this->tokenStorage->getToken()->getUser());
    }
}