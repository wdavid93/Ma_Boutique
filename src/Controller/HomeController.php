<?php

namespace App\Controller;

require_once dirname(__DIR__)."/Service/Mailer.php";

use App\Model\Cart;
use App\Service\Mailer;
use App\Repository\HeadersRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    //#[Route('/', name: 'home')]
     /**
     * Cette fonction permet une ecoute sur l'URL 'localhost:8000', le point d'entrée de notre site 
     * 
     * @Route("/", name="home")
     */
    public function index(ProductRepository $productRepository, HeadersRepository $headersRepository): Response
    {

       // (new Mailer)->sendMailDirect();

        //$products = $productRepository->findByIsInHome(1);
        //$cartProducts = $cart->getDetails();
        $products = $productRepository->find(1);
        $headers = $headersRepository->findAll();
        return $this->render('home/index.html.twig', [
            'carousel' => true,  //Le caroussel ne s'affiche que sur la page d'accueil (voir base.twig)
            'top_products' => $products,
            'headers' => $headers,
         //   'totalPrice' =>$cartProducts['totals']['price']
        ]);
    }

    // #[Route('a-propos', name: 'about')]
    /**
     * @Route("a-propos", name="about")
     */
    
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }
}
