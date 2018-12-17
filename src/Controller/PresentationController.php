<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 17/12/2018
 * Time: 17:23
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    /**
     * @Route("/pages", name="presentation")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/presentation.html.twig',[
           "current_menu" => "presentation"
        ]);
    }
}