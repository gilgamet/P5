<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 14/01/2019
 * Time: 11:09
 */

namespace App\Controller\Admin;


use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController
{

    /**
     * @param ObjectManager $em
     */
    public function construct(ObjectManager $em)
    {

    }

    /**
     * @Route("")
     * @return Response
     */
    public function index(): Response
    {
        $presentation = $this->repository->findAll();
        return $this->render('admin/presentation/index.html.twig', compact('presentation'));
    }
}