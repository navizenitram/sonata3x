<?php
declare(strict_types=1);


namespace App\Admin;


use Doctrine\DBAL\Types\DecimalType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use KunicMarko\SonataAutoConfigureBundle\Annotation as Sonata;

/**
 * @Sonata\AdminOptions(
 *     label="Facturas",
 *     group="Facturación",
 *     icon="<i class='fa fa-bullseye'></i>",
 * )
 */
final class BillsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->tab('Tab 1')
                   ->with('Datos factura', ['class' => 'col-md-6'])
                       ->add('bill_number')
                       ->add('total')
                       ->end()
                   ->end()
                   ->tab('Tab 2')
                       ->with('Datos cliente', ['class' => 'col-md-6'])
                       ->add('customer')
                       ->end()
                   ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('bill_number');
        $datagridMapper->add('customer');
        $datagridMapper->add('total');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        //https://symfony.com/doc/3.x/bundles/SonataAdminBundle/reference/field_types.html
        $listMapper->addIdentifier('bill_number');
        $listMapper->addIdentifier('customer', null, ['label' => 'Cliente']);
        $listMapper->addIdentifier('total', 'currency', ['currency' => 'EUR']);
        $listMapper->add('_action',
            null,
            [
                'label'   => 'Acciones molonas',
                'actions' => [
                    'show'   => [],
                    'edit'   => [],
                    'delete' => [],
                ],
            ]);
    }
}