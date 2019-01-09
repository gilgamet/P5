<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 07/01/2019
 * Time: 08:29
 */

namespace App\Controller\Mail;


use App\Entity\Contact;
use Twig\Environment;

class ContactMail
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $renderer;

    /**
     * ContactMail constructor.
     * @param \Swift_Mailer $mailer
     * @param Environment $renderer
     */
    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    /**
     * @param Contact $contact
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function Mail(Contact $contact)
    {
        $message = (new \Swift_Message("Demande de contact :"))
            ->setFrom($contact->getEmail())
            ->setTo('gilgamet04@gmail.com')
            ->setReplyTo($contact->getEmail())
            ->setBody($this->renderer->render("emails/contact.html.twig",[
                'contact' => $contact
            ]), "text/html");
        $this->mailer->send($message);
    }
}