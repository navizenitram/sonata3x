Ejemplo de Symfony 4 con Sonata 3
<p>No está siendo fácil, la documentación es lamentable</p>
<h3>Pasos de la instalación que están funcionando: (intento de roadmap al éxito)</h3>
<ul>
    <li>Instalación de Symfony 4.4: </li>
    <li>Instalación de Sonata</li>
    <li>Instalación de SonataDoctrineORM</li>
    <li>Crear entidad de prueba</li>
    <li>Crear primera clase Admin de prueba (CustomerAdmin) que hereda de AbstractAdmin</li>
    <li>Instalo Auto Configuring Admin Classes: composer require kunicmarko/sonata-auto-configure-bundle</li>
    <li>Creo el fichero config/packages/sonata_auto_configure.yaml y hago copy&paste de la docu:https://symfony.com/doc/master/bundles/SonataAdminBundle/cookbook/recipe_auto_configure_admin_classes.html</li>
    <li>FOSUserbundle: <ul><li>https://www.usualmente.com/2018/05/17/fosuserbundle-en-symfony4/</li> <li>https://ourcodeworld.com/articles/read/267/how-to-add-a-role-to-an-user-with-fosuserbundle-in-symfony-3</li></ul>
    </li>
</ul>
~~~~
https://github.com/sonata-project/SonataAdminBundle/issues/4910

Run composer require sonata-project/admin-bundle:3.x@dev

Run composer require sonata-project/doctrine-orm-admin-bundle:3.x@dev

Create new file config/packages/sonata_admin.yaml

sonata_admin:
    title: 'Sonata Admin'
    dashboard:
        blocks:
            - { type: sonata.admin.block.admin_list, position: left }

sonata_block:
    blocks:
        sonata.admin.block.admin_list:
            contexts: [admin]
Create new file config/routes/sonata_admin.yaml

admin_area:
    resource: "@SonataAdminBundle/Resources/config/routing/sonata_admin.xml"
    prefix: /admin

_sonata_admin:
    resource: .
    type: sonata_admin
    prefix: /admin
Run composer auto-scripts

Soon, it won't be necessary. It will be just create-project + require sonata-project/doctrine-orm-admin-bundle