<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 24/12/2018
 * Time: 10:57
 */

namespace App\Controller;

use App\Controller\Mail\ContactMail;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param ContactMail $contactMail
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index(Request $request, ContactMail $contactMail): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactMail->Mail($contact);
            $this->addFlash("success", "Votre message a été envoyé");
            return $this->redirectToRoute('contact');
        }

        return $this->render('pages/contact.html.twig',[
            'current_menu' => 'contact',
            'form' => $form->createView()
        ]);
    }
}