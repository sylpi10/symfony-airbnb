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

    #[Route('/', name: 'create_home')]
    public function home(): Response
    {
        $em = $this->manager->getManager();
        $home = new Home();
        $home->setTitle('first home');
        $home->setAddress('221 baker street');
        $em->persist($home);
        $em->flush($home);

        // return $this->render('home/index.html.twig', [
        //     'controller_name' => 'HomeController',
        // ]);

        return new Response('saved home with id ' . $home->getId());
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
