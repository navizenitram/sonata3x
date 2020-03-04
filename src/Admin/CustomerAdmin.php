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
 *     label="Clientes",
 *     group="Facturacion",
 *     icon="<i class='fa fa-user'></i>",
 * )
 */

final class CustomerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('Name', TextType::class);
        $formMapper->add('uuid', TextType::class);
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