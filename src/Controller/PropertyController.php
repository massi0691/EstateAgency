<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Cocur\Slugify\Slugify;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{

    private $repository;
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }


    /**
     * @Route("/properties", name="app_property")
     */


    public function index(): Response
    {

        $property = $this->repository->findAllVisibleQuery();
        dump($property);
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties',
        ]);
    }



    /**
     * @Route("/biens/{slug}-{id<[0-9]+", name="app_property_show", requirements ={"slug": "[a-z0-9\-]*"})
     */


    public function show(Property $property, string $slug): Response
    {
        if ($property->getSlug() !== $slug) {
            return $this->redirectToRoute('app_property_show', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }

        return $this->render('property/show.html.twig', [
            'current_menu' => 'properties',
            'properties' => $property
        ]);
    }
}
