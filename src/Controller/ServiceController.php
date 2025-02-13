<?php

namespace App\Controller;

use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class ServiceController extends AbstractController
{
    #[Route('/service/{slug}', name: 'app_service_details')]
    public function view(EntityManagerInterface $entityManager, string $slug): Response
    {
        $service = $entityManager->getRepository(Service::class)->findOneBySlug($slug);
        
        if (!$service) {
            return $this->redirectToRoute('app_home');
        }
        
        return $this->render('service/details.html.twig', [
            'service' => $service
        ]);
    }

    #[Route('/service/{id}', name: 'app_service')]
    public function index(ServiceRepository $productRepository, int $id): Response
    {
        // $product = $entityManager->getRepository(Tuto::class)->find($id);
        $product = $productRepository->findOneById($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
            'name' => $product->getName()
        ]);
    }

    #[Route('/add-service', name: 'create_service')]
    public function createService(EntityManagerInterface $entityManager): Response
    {
        $product = new Service();
        $product->setName('Menage');
        $product->setSlug('service-menage');
        $product->setSubtitle('Lorem ipsum dolor sit amet.');
        $product->setDescription('Lorem ipsum dolor sit amet.');
        $product->setImage('menage.png');

        $product->setLink('https://www.google.fr');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

}
