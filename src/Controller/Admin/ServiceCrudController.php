<?php

namespace App\Controller\Admin;


use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;


class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    
    public function configureFields(string $pageName): iterable
{
    $fields =  [

        ImageField::new('image', 'Image')
            ->setBasePath('uploads/') 
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),

    ];

    $slug = SlugField::new('slug')->setTargetFieldName('name');

    $name = TextField::new('name', 'Titre')
        ->setFormTypeOptions([
            'attr' =>[
                'maxlength' => 255
            ]
            ]);

    $subtitle = TextField::new('subtitle', 'Sous-titre')
            ->setFormTypeOptions([
                'attr' =>[
                    'maxlength' => 255
                ]
                ]);

    $link = TextField::new('link', 'Lien')
            ->setFormTypeOptions([
                'attr' =>[
                    'maxlength' => 255
                    ]
                    ]); 
                    
    $description = TextEditorField::new('description', 'Description');


    $fields[] = $name;
    $fields[] = $subtitle;
    $fields[] = $slug;
    $fields[] = $link;
    $fields[] = $description;


   return $fields;



                } 
    
}
