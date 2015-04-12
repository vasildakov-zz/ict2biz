<?php

namespace Domain;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'abstract_factories' => array(),
            'aliases' => array(),
            'factories' => array(
                // Form
                'Domain\Form\BookForm' => 'Domain\Factory\Form\BookFormFactory',

                // Service
                'Domain\Service\BookService' => 'Domain\Factory\Service\BookServiceFactory',

                // Repository
                'Domain\Repository\BookRepository' => 'Domain\Factory\Repository\BookRepositoryFactory',
            ),
            'invokables' => array(),
            'services' => array(),
            'shared' => array(),
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
