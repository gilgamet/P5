<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 03/12/2018
 * Time: 17:37
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/portfolio", name="portfolio.index")
     * @return Response
     */

     public function index(): Response
     {
        $menu = "portfolio";
        return $this->render("portfolio/index.html.twig", [
            "current_menu" => $menu
         ]);
     }

}