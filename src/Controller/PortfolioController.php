<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 03/12/2018
 * Time: 17:37
 */

namespace App\Controller;


use Cocur\Slugify;
use App\Repository\PortfolioRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{


    /**
     * PortfolioController constructor.
     * @param PortfolioRepository $repository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PortfolioRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/portfolio", name="portfolio.index")
     * @param PortfolioRepository $repository
     * @return Response
     */

     public function index(PortfolioRepository $repository): Response
     {
         $portfolios = $repository->findAll();
         return $this->render("portfolio/index.html.twig", [
            "current_menu" => "portfolio",
             "portfolios" => $portfolios
         ]);
     }

    /**
     *
     * @Route("/portfolio/(slug)-(id)", name="portfolio.show" , requirements={"slug": "[a-z0-9\-]*"})
     * @param $slug
     * @param $id
     * @return Response
     */
     public function show($slug, $id): Response
     {
        $portfolio = $this->repository->find($id);
        return $this->render("property/show.html.twig", [
                "portfolio" => $portfolio,
                "current_menu" => "portfolio"
            ]);
     }

}