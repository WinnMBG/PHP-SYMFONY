<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{

    private ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }
    
    #[Route('/product/{slug}', name: 'oneProduct')]
    public function index(string $slug):Response
    {
        $one = $this->productRepo->findOneBy(['slug' => $slug]);
        return $this->render('product/detail.html.twig', ['blabla' => $one]);
    }

    #[Route('/products/page/{page}', name: 'productsAll')]
    public function indexe(int $page):Response
    {
        $nbproducts = ceil($this->productRepo->getTotalProducts() / 4);
        $productsForPage = $this->productRepo->getProductsByPage($page);
        return $this->render('product/index.html.twig', ['products' => $productsForPage, 'nb' => $nbproducts]);
    }
}

?>