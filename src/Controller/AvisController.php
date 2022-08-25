<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisFormType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="app_avis")
     */
    public function index(AvisRepository $avisRepo): Response
    {
        $avis = $avisRepo->findAll();

        return $this->render('avis/index.html.twig', [
           'avis' => $avis
        ]);
    }
    /**
     * @Route("/avis/detail/{id}", name="app_avis_detail")
     */
     public function avisDetail($id, AvisRepository $avisRepo): Response
     {
        $avis = $avisRepo->find($id);

        return $this->render("avis/detail.html.twig", [
            'avis' => $avis
        ]);
     }
     /**
     * @Route("/avis/edit/{id}", name="app_avis_edit")
     */
    public function avisEdit(Avis $avis, Request $request, EntityManagerInterface $manager): Response
    {
        // dd($avis);

        $form = $this->createForm(AvisFormType::class, $avis);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();

            $this->addFlash('info', "L'avis a bien été modiifé");

            return $this->redirectToRoute("app_avis");
        }

        return $this->render("avis/edit.html.twig", [
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/avis/del/{id}", name="app_avis_del")
     */
     public function delAvis(Avis $avis, EntityManagerInterface $manager): Response
     {

        $manager->remove($avis);

        $manager->flush(); 

        $this->addFlash('danger', "L'avis utilisateur a bien été supprimé");

        return $this->redirectToRoute("app_avis"); 
     }
}
