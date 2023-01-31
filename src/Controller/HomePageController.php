<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProductRepository;

class HomePageController extends AbstractController
{

    private ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    #[Route('/', name: 'index')]
    public function index():Response
    {
        // $c = $this->productRepo->getTotalProducts();
        $finded = $this->productRepo->getRandomValues();
        return $this->render('homepage/index.html.twig', ['finded' => $finded]);
    }
}

?>