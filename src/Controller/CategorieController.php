<?php
namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategorieController extends AbstractController
{

    private CategorieRepository $categoryRepo;

    public function __construct(CategorieRepository $categoieRepository)
    {
        $this->categoryRepo = $categoieRepository;
    }

    #[Route('/categories', name: 'indexCat')]
    public function index():Response
    {
        $finded = $this->categoryRepo->getCate();
        return $this->render('category/index.html.twig', ['categories' => $finded]);
    }

    #[Route('/categories/{slug}', name: 'indexCat2')]
    public function products(string $slug):Response
    {
        $finded = $this->categoryRepo->getProductByCate($slug);
        return $this->render('category/products.html.twig', ['categories2' => $finded]);
    }
}