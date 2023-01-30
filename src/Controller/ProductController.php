<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{

    private ProductRepository $productRepo;
    private array $productsA = [
        "prod1" => [
            "name" => "Ballon d'or",
            "price" => "200000€",
            "disponibility" => "2"
        ],
        "prod2" => [
            "name" => "Ballon World Cup",
            "price" => "20€",
            "disponibility" => "200"
        ]
    ];
    
    #[Route('/{product/slug}', name: 'indexA')]
    public function index(string $slug):Response
    {
        $titre = 'Acceuil';
        return $this->render('product/detail.html.twig', ['blabla' => $this->productsA[$product]]);
    }

    #[Route('/{products}', name: 'indexP')]
    public function indexe(string $products):Response
    {
        $all = $this->productRepo->findAll();
        return $this->render('product/detail.html.twig', ['products' => $all]);
    }
}

?>