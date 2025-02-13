<?php

namespace App\Controller;

use App\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route(['/', '/home'], name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $services = $entityManager->getRepository(Service::class)->findAll();

        return $this->render('home/index.html.twig', [
            'services' =>$services,
            //'controller_name' => 'HomeController',
        ]);
    }
}
