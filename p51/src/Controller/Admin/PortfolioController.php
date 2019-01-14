<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 24/12/2018
 * Time: 15:30
 */

namespace App\Controller\Admin;


use App\Entity\Portfolio;
use App\Form\EditPortfolioType;
use App\Repository\PortfolioRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/admin", name="admin.portfolio.index")
     * @return Response
     */
    public function index(): Response
    {
        $portfolios = $this->repository->findAll();
        return $this->render('admin/portfolio/index.html.twig', compact('portfolios'));
    }

    /**
     * @Route("/admin/{id}", name="admin.portfolio.edit", methods="GET|POST")
     * @param Portfolio $portfolio
     * @param Request $request
     * @return Response
     */
    public function edit(Portfolio $portfolio, Request $request)
    {
        $form = $this->createForm(EditPortfolioType::class, $portfolio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success', 'Modifié avec succes');
            return $this->redirectToRoute('admin.portfolio.index');
        }

        return $this->render('admin/portfolio/edit.html.twig', [
            'portfolio => $portfolio',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/portfolio/create", name="admin.portfolio.new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */

    public function new(Request $request)
    {
        $portfolio = new portfolio();
        $form = $this->createForm(EditPortfolioType::class, $portfolio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($portfolio);
            $this->em->flush();
            $this->addFlash("success", "Nouveau projet Crée");
            return $this->redirectToRoute('admin.portfolio.index');
        }

        return $this->render('admin/portfolio/new.html.twig', [
            'portfolio' => $portfolio,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/portfolio/{id}", name="admin.portfolio.delete", methods="DELETE")
     * @param Portfolio $portfolio
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Portfolio $portfolio, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $portfolio->getId(), $request->get('_token'))){
            $this->em->remove($portfolio);
            $this->em->flush();
            $this->addFlash('success', 'Suppression éffectué');
        }
        return $this->redirectToRoute("admin.portfolio.index");
    }

}