<?php
declare(strict_types=1);


namespace App\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use KunicMarko\SonataAutoConfigureBundle\Annotation as Sonata;
/**
 * @Sonata\AdminOptions(
 *    showInDashboard=false,
 * )
 */
final class BillRowsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('description');
        $formMapper->add('price');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('description');
        $datagridMapper->add('price');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('description');
        $listMapper->addIdentifier('price','currency', ['currency' => 'EUR']);
    }
}