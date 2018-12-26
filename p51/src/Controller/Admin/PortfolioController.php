<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 24/12/2018
 * Time: 15:30
 */

namespace App\Controller\Admin;


use App\Entity\Portfolio;
use App\Repository\PortfolioRepository;
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

    public function __construct(PortfolioRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.portfolio.index")
     * @return Response
     */
    public function index(): Response
    {
        $portfolios = $this->repository->findAll();
        return $this->render('Admin/portfolio/index.html.twig', compact('portfolios'));
    }


    /**
     * @Route("/admin/{id}", name="admin.portfolio.edit")
     * @param Portfolio $portfolio
     * @return Response
     */
    public function edit(Portfolio $portfolio)
    {
        return $this->render('admin/portfolio/admin.portfolio.edit', compact('portfolio'));
    }

}