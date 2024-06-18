<?php

namespace App\Controller\Admin;

use App\Entity\Cancion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class CancionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cancion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield ImageField::new('archivo')->setUploadDir('public/canciones/');
        yield TextField::new('nombre');
        yield TextField::new('artista');
        yield TextField::new('album');
        yield TextField::new('duracion');
        yield IntegerField::new('ano');
        
        return [
            IdField::new('id'),
            TextField::new('nombre'),
            TextField::new('artista'),
            TextField::new('album'),
            TextField::new('duracion'),
            IntegerField::new('ano'),
            ImageField::new('archivo')
                ->setFormType(FileUploadType::class)
                ->setBasePath('public/canciones/')
        ];
    }
}
