<?php
return array(
    // Data Fixtures
    'data-fixture' => array(
        'location' => __DIR__ . '/../src/Domain/Fixture',
    ),
    // Doctrine
    'doctrine' => array(
        // authentication service configuration
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Domain\Entity\User',
                /*'identity_property' => 'email',
                'credential_property' => 'password',
                'credential_callable' => 'Domain\Service\CryptoService::verifyPassword'
                #'credential_callable' => function(\Application\Entity\User $user, $passwordGiven) {
                #    return (md5($passwordGiven) == $user->getPassword());
                #},*/
            ),
        ),
        // Metadata Mapping driver configuration
        'driver' => array(
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'Domain_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Domain/Entity')
            ),

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => array(
                'drivers' => array(
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'Domain\Entity' => 'Domain_driver'
                )
            )
        ),
        // Doctrine Migrations
        'migrations_configuration' => array(
            'orm_default' => array(
                'directory' => 'data/DoctrineORMModule/Migrations',
                'name'      => 'Doctrine Database Migrations',
                'namespace' => 'Domain\Entity',
                'table' => 'migrations',
            ),
        ),
    ),
);