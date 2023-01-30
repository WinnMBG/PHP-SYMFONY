<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    private array $products = [
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
    
    #[Route('/{product}', name: 'indexA')]
    public function index(string $product):Response
    {
        $titre = 'Acceuil';
        return $this->render('product/detail.html.twig', ['blabla' => $this->products[$product]]);
    }
}

?>