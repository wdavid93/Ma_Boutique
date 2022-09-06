<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use App\Entity\User;
use App\Entity\Order;
use App\Entity\Carrier;
use App\Entity\Headers;
use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /** 
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(OrderCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ma Boutique'); // Titre du Back Office

    }

    public function configureMenuItems(): iterable
    {
        // linkToDashboard permet de créer le home du menu
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        // linkToCrud permet de créer les menus en les reliant a une table
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-tag', Product::class);
        yield MenuItem::linkToCrud('Transporteurs', 'fas fa-truck', Carrier::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-shopping-cart', Order::class); 
        yield MenuItem::linkToCrud('Avis', 'fas fa-desktop', Avis::class);      
        yield MenuItem::linkToCrud('Bannières', 'fas fa-desktop', Headers::class);
        return [ // linkToRoute permet de créer un lien pour retourner au site
            yield MenuItem::linkToRoute('Retour', 'fa fa-home', 'home')
        ];
    }
}


