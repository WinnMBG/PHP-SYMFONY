<?php
namespace App\Controller;

// use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Form\ContactType;
use App\Form\ContactModel;

class ContactController extends AbstractController
{
    public function __construct(private RequestStack $requestStack) {

    }

    #[Route('/contact', name: 'indexContact')]
    public function index():Response
    {
        $type = ContactType::class;
        $model = new ContactModel();
        $form = $this->createForm($type, $model);
        $form->handleRequest($this->requestStack->getCurrentRequest());
        if($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('notice', 'You will be contacted soon');
            return $this->redirectToRoute('index');
        }
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}