<?php

declare(strict_types=1);

namespace MicroIceCms;

/**
 * The configuration provider for the Cms module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
            'micro-ice-db' => $this->getDbConnection(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                V1\DbAdapter::class => V1\DbAdapterFactory::class,
                V1\Rest\Pages\Repository\PagesModel::class => V1\Rest\Pages\Repository\PagesModelFactory::class,
                V1\Rest\Pages\RequestHandler\Pages::class => V1\Rest\Pages\RequestHandler\PagesFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'micro-ice-cms'    => [__DIR__ . '/../templates/'],
            ],
        ];
    }
    
    /**
     * Returns the templates configuration
     */
    public function getDbConnection() : array
    {
        return [
            'connection' => [
                '_default' => [
                    // default db connection goes here
                ],
                'v1' => [
                    'driver'            => 'Pdo',
                    'dsn'               => 'mysql:dbname=microice_cms;host=localhost',
                    'driver_options'    => array(
                        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
                    ),
                    'username'          => 'repkit',
                    'password'          => '******'
                ],
            ],
            'options' => [
                'v1' => [
                    'table_prefix' => 'xilem_v1_',
                    'general_features' => [
                        /* feature that will be gathered from container */
                        // Zend\Db\TableGateway\Feature\EventFeature::class
                    ],
                ]
            ]
        ];
    }
}
