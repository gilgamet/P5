<?php
/**
 * Created by PhpStorm.
 * User: gilgamet
 * Date: 24/12/2018
 * Time: 10:51
 */

namespace App\Controller;

use App\Repository\Presentation2Repository;
use App\Repository\PresentationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Serializer;

class PresentationController extends AbstractController
{
    /**
     * @Route("/presentation", name="presentation")
     * @param PresentationRepository $repository
     * @return Response
     */
    public function index(PresentationRepository $repository): Response
    {
        //$presentation2 = $repository2->findBy(['id' > 3]);
        $presentations = $repository->findAll();
        return $this->render('pages/presentation.html.twig', [
            //'presentation2' => $presentation2,
            'current_menu' => 'presentation',
            'presentations' => $presentations
        ]);
    }

    /**
     * @Route("/presentation", name="presentation")
     * @param Serializer $serializer
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function guzzle(Serializer $serializer)
        {
            $client = new Client([
                // Base URI is used with relative requests
                'base_uri' => 'http://api.apixu.com/'
            ]);
            $response = $client->request('GET', 'v1/current.json?key=3433f5fa760f4aee81f95221190602&q=Malijai');
            $code = $response->getStatusCode();
            if ($code !== 200){
                return 'Erreur Reseau';
            }
            $datas = $this->serializer->deserialize($response->getBody()->getContents(), 'array', 'json');
            ;
            return $this->render('pages/presentation.html.twig', [
                'temperature' => $datas["current.temp_c"],
                'temperatureRessentie' => $datas["current.temp.feelslike_c"],
                'wind' => $datas['current.wind_kph']
            ]);
        }
}