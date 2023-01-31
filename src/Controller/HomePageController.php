<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index():Response
    {
        return $this->render('homepage/index.html.twig');
    }
}

?>