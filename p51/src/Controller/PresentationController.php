<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 24/12/2018
 * Time: 10:51
 */

namespace App\Controller;


use App\Entity\Presentation;
use App\Repository\Presentation2Repository;
use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="presentation")
     * @param PresentationRepository $repository
     * @param Presentation2Repository $repository2
     * @return Response
     */
    public function index(PresentationRepository $repository, Presentation2Repository $repository2): Response
    {   $presentation2 = $repository2->findAll();
        $presentations = $repository->findAll();
        return $this->render('pages/presentation.html.twig', [
            'presentation2' => $presentation2,
            'current_menu' => 'presentation',
            'presentations' => $presentations
        ]);
    }



}