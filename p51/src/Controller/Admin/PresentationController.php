<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 14/01/2019
 * Time: 11:09
 */

namespace App\Controller\Admin;


use App\Entity\Presentation;
use App\Entity\Presentation2;
use App\Form\PresentationType;
use App\Repository\Presentation2Repository;
use App\Repository\PresentationRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @var Presentation2RepositoryRepository
     */
    private $P2repository;

    /**
     * @param PresentationRepository $Prepository
     * @param Presentation2Repository $P2repository
     * @param ObjectManager $em
     */
    public function __construct(PresentationRepository $Prepository, Presentation2Repository $P2repository, ObjectManager $em)
    {
        $this->P2repository = $P2repository;
        $this->Prepository = $Prepository;
        $this->em = $em;
    }

    /**
     * @Route("/admin.presentation.index", name="admin.presentation.index")
     * @return Response
     */
    public function index(): Response
    {
        $presentations = $this->Prepository->findAll();
        return $this->render('admin/presentation/index.html.twig', compact('presentations'));
    }

    /**
     * @Route("/admin.presentation.new", name="admin.presentation.new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request)
    {
        $presentation = new Presentation();
        $presentation2 = new Presentation2();
        $form = $this->createForm(PresentationType::class, $presentation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($presentation);
            $this->em->flush();
            $this->addFlash('success', 'Uploadé avec succes');
            return $this->redirectToRoute('admin.presentation.index');
        }

            return $this->render('admin/presentation/new.html.twig', [
                'presentation2' => $presentation2,
                'presentation' => $presentation,
                'form' => $form->createView(),
                'csrf' => false,
            ]);
    }

}