<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 17/12/2018
 * Time: 17:13
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     *@Route("/pages", name="contact")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/contact.html.twig', [
            "current_menu" => 'contact'
        ]);
    }
}