<?php

declare(strict_types=1);

namespace MicroIceCms\V1;

use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\ResultSet\ResultSet;

class DbAdapterFactory
{
    public function __invoke(ContainerInterface $container) : DbAdapter
    {
        $driver = $container->get('config')['micro-ice-db']['connection']['v1'];
        
        if(empty($driver)){
            $driver = $container->get('config')['micro-ice-db']['connection']['_default'];
        }
        
        // PlatformInterface
        $platform = null;
        
        // ResultSet
        $queryResultSetPrototype = null; 
        
        return new DbAdapter($driver, $platform, $queryResultSetPrototype);
        
    }
}