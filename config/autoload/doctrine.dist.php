<?php
// Development Config
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '1',
                    'charset'  => 'utf8',
                    'dbname'   => 'ict2biz',
                    'driverOptions' => array(
                        1002=>'SET NAMES utf8'
                    )
                )
            )
        ),
        'cache' => array(
            'class' => 'Doctrine\Common\Cache\ArrayCache'
        ),
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache' => 'array',
                'query_cache'    => 'array',
                'result_cache'   => 'array',
                'generate_proxies' => true
            )
        ),
    ),
);