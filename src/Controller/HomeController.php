<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 03/12/2018
 * Time: 16:38
 */
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/pages", name="home")
     * @return Response
     */
    public function index():Response
    {
        return $this->render('pages/home.html.twig', [
            "current_menu" => 'home'
        ]);
    }
}