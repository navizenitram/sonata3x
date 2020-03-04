<?php
declare(strict_types=1);


namespace App\Admin;


use Doctrine\DBAL\Types\DecimalType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use KunicMarko\SonataAutoConfigureBundle\Annotation as Sonata;

/**
 * @Sonata\AdminOptions(
 *     label="Facturas",
 *     group="Facturacion",
 *     icon="<i class='fa fa-user'></i>",
 * )
 */
final class BillsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('bill_number', TextType::class);
        $formMapper->add('customer_id', IntegerType::class);
        $formMapper->add('total', IntegerType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('bill_number');
        $datagridMapper->add('customer_id'); //TODO: Mostar el Nombre del Cliente
        $datagridMapper->add('total');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('bill_number');
        $listMapper->addIdentifier('customer_id'); //TODO: Mostar el Nombre del Cliente
    }
}