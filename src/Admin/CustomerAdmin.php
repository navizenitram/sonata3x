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
        $formMapper->add('Name');
        $formMapper->add('uuid');
        $formMapper->add('country');
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