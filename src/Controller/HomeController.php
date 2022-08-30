<?php

namespace App\Controller;

use App\Entity\Home;
use App\Repository\HomeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private ManagerRegistry $manager;
    private HomeRepository $homeRepo;
    public function __construct(ManagerRegistry $manager, HomeRepository $homeRepo)
    {
        $this->manager = $manager;
        $this->homeRepo = $homeRepo;
    }

    #[Route('/home', name: 'appreact')]
    public function home(): Response
    {
        $em = $this->manager->getManager();
        $home = new Home();
        $home->setTitle('first home');
        $home->setAddress('221 baker street');
        $em->persist($home);
        $em->flush($home);

        return $this->render('default/index.html.twig');


        // $response = new Response();

        // $response->headers->set('Content-Type', 'application/json');
        // $response->headers->set('Access-Control-Allow-Origin', '*');

        // // $response->setContent(json_encode($users));

        // return $response;

        // return new Response(' <h1> saved home with id ' . $home->getId() . '</h1>');
    }
    #[Route('/{id}', name: 'show_home')]
    public function homeDetails(int $id): Response
    {
        // $home = $this->manager->getRepository(Home::class)->find($id);
        // if (!$home) {
        //     throw $this->createNotFoundException('no home for id: ' . $id);
        // }

        $home = $this->homeRepo->find($id);

        // return $this->render('home/index.html.twig', [
        //     'controller_name' => 'HomeController',
        // ]);

        return new Response('details of ' . $home->getTitle());
    }
}
