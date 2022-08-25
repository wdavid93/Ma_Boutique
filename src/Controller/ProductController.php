<?php

namespace App\Controller;

use App\Model\Cart;
use App\Entity\Avis;
use App\Model\Search;
use App\Form\SearchType;
use App\Form\AvisFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    // #[Route('/articles', name: 'product')]
    /**
     * @Route("/articles", name="product")
     */
    public function index(ProductRepository $repository, Request $request): Response
    {
       
        // Si recherche exécutée, $products contiendra les résultats filtrés
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);
             

        if ($form->isSubmitted() && $form->isValid()) {
            $products = $repository->findWithSearch($search);
            // $products = $repository->findBy(["id"=>"2"]);
        } else {
            // $products = $repository->findBy(["id"=>"2"]);
            $products = $repository->findAll();
        }

        return $this->renderForm('product/index.html.twig', [
            'products' => $products,
            'form' => $form //,
           // 'totalPrice' =>$cartProducts['totals']['price']
        ]);
    }

    // #[Route('/articles/{slug}', name: 'product_show')]
    /**
     * @Route("/articles/{id}-{slug}", name="product_show")
     */
    public function show($id, Request $request, ProductRepository $repository, string $slug , EntityManagerInterface $manager): Response
    {
        $product = $repository->findOneBySlug($slug);

        if (!$product) {
            return $this->redirectToRoute('product');
        }
        $paramRoute = $request->attributes->get('_route');

      //  echo($paramRoute);

        $avis = new Avis;

        $form = $this->createForm(AvisFormType::class, $avis);

        $form->handleRequest($request);

      //  echo($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avis->setCreatedAt(new \DateTime())
                 ->setProduct($repository->find($id));

            $manager->persist($avis);
            $manager->flush();

            $this->addFlash('success', "Votre avis a bien été posté!");

            return $this->redirectToRoute("product", [
                'id' => $id
            ]);
        }     
      
        // return $this->render("produit/detail.html.twig", [
        //     'produit' => $produitRepo->find($id),
        //     'form' => $form->createView()
        // ]);

        return $this->render('product/show.html.twig', [
            'product' => $product,         
            'form' => $form->createView()
        ]);
    }
        /**
     * @Route("/articles/{id}-{slug}", name="product_show")
     */
    public function alert($id, Request $request, ProductRepository $repository, string $slug , EntityManagerInterface $manager): Response
    {
        $product = $repository->findOneBySlug($slug);

        if (!$product) {
            return $this->redirectToRoute('product');
        }
    //    $paramRoute = $request->attributes->get('_route');

      //  echo($paramRoute);

        $avis = new Avis;

        $form = $this->createForm(AvisFormType::class, $avis);

        $form->handleRequest($request);

      //  echo($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avis->setCreatedAt(new \DateTime())
                 ->setProduct($repository->find($id));

            $manager->persist($avis);
            $manager->flush();

            $this->addFlash('success', "Votre avis a bien été posté!");

            return $this->redirectToRoute("product", [
                'id' => $id
            ]);
        }     
      
        return $this->render('product/show.html.twig', [
            'product' => $product,         
            'form' => $form->createView()
        ]);
    }
}


