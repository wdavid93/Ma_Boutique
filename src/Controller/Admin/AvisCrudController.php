<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AvisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Avis::class;
    }

    public function configureActions(Actions $actions): Actions 
    {
        return $actions
            ->add('index', 'detail')
            ;
    }

  
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('auteur','Auteur'),            
            TextareaField::new('contenu')->hideOnIndex(),
            DateTimeField::new('created_at', 'Créée le')
        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Avis')
            ->setEntityLabelInPlural('Avis')
        ;
    }

}
// --
// -- Structure de la table `avis`
// --

// CREATE TABLE `avis` (
//   `id` int(11) NOT NULL,
//   `product_id` int(11) NOT NULL,
//   `auteur` varchar(255) NOT NULL,
//   `contenu` longtext NOT NULL,
//   `created_at` datetime NOT NULL
// ) ;
