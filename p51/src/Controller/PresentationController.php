<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 24/12/2018
 * Time: 10:51
 */

namespace App\Controller;

//use App\Repository\Presentation2Repository;
use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="presentation")
     * @param PresentationRepository $repository
     * @return Response
     */
    public function index(PresentationRepository $repository): Response
    {
        $presentations = $repository->findAll();
        //$presentations2 = $repository->findAll();
        return $this->render('pages/presentation.html.twig', [
            'current_menu' => 'presentation',
            'presentations' => $presentations
        ]);
    }

}