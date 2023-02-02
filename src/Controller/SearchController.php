<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Repository\ProductRepository;

class SearchController extends AbstractController
{

    private ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }
    
    #[Route('/search', name: 'searchProduct')]
    public function index():Response
    {
        return $this->render('search/index.html.twig', ['value' => $this->productRepo->search($_GET['name'])]);
    }
}

?>