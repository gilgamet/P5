<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 21/12/2018
 * Time: 14:43
 */

namespace App\Controller;

use App\Entity\Portfolio;
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

    /**
     * PortfolioController constructor.
     * @param PortfolioRepository $repository
     * @param ObjectManager $em
     */
    public function __construct(PortfolioRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/portfolios", name="portfolio.index")
     * @param PortfolioRepository $repository
     * @return Response
     */
    public function index(PortfolioRepository $repository): Response
    {
        $portfolios = $repository->findAll();
        return $this->render("portfolio/index.html.twig", [
            "portfolios" => $portfolios,
            "current_menu" => 'portfolios'
        ]);
    }

    /**
     *
     * @Route("/portfolios/{slug}-{id}", name="portfolio.show" , requirements={"slug": "[a-z0-9\-]*"})
     * @param Portfolio $portfolio
     * @param string $slug
     * @return Response
     */
    public function show(Portfolio $portfolio, string $slug): Response
    {
        if ($portfolio->getSlug() !== $slug) {
            return $this->redirectToRoute('portfolio.show',[
                'id' => $portfolio->getId(),
                'slug' => $portfolio->getSlug()
            ], 301);
        }
        return $this->render("portfolio/show.html.twig", [
            "portfolio" => $portfolio,
            "current_menu" => "portfolios"
        ]);
    }
}