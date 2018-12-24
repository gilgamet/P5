<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 24/12/2018
 * Time: 10:57
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/contact.html.twig',[
            'current_menu' => 'contact'
        ]);
    }
}