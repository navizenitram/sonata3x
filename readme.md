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