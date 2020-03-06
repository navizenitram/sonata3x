<?php
declare(strict_types=1);


namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use KunicMarko\SonataAutoConfigureBundle\Annotation as Sonata;

/**
 * @Sonata\AdminOptions(
 *     adminCode="service.admin.customer",
 *     label="Clientes",
 *     group="Facturación",
 *     icon="<i class='fa fa-bullseye'></i>",
 *     autowireEntity=true,
 * )
 */

final class CustomerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('id',null,['disabled' => true]);
        $formMapper->add('Name');
        $formMapper->add('uuid');
        $formMapper->add('country',
            \Sonata\AdminBundle\Form\Type\ModelListType::class,
            ['btn_add'  => false,
             'btn_edit' => false,
             'btn_delete'=>false,
            ]);
        //$formMapper->add('country');
        //$formMapper->add('country', \Sonata\AdminBundle\Form\Type\ModelAutocompleteType::class, ['property' =>
        // 'name']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('uuid');
        $datagridMapper->add('Name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('Name');
    }


}