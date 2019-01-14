<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 14/01/2019
 * Time: 11:09
 */

namespace App\Controller\Admin;


use App\Repository\PresentationRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    /**
     * @var PresentationRepository
     */
    private $Prepository;
    /**
     * @var ObjectManager
     */
    private $em;

    /**
     * @param PresentationRepository $Prepository
     * @param ObjectManager $em
     */
    public function __construct(PresentationRepository $Prepository, ObjectManager $em)
    {
        $this->Prepository = $Prepository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.presentation.index")
     * @return Response
     */
    public function index(): Response
    {
        $presentation = $this->Prepository->findAll();
        return $this->render('admin/presentation/index.html.twig', compact('presentation'));
    }

    /**
     * @Route("/admin.presentation.edit", name="admin.presentation.edit")
     * @return Response
     */
    public function edit()
    {
        return $this->render('admin/presentation/edit.html.twig');
    }

}