<?php

declare(strict_types=1);

namespace MicroIceCms\V1\Rest\Pages\Repository;

use Zend\Db\TableGateway\Feature\FeatureSet;
use Zend\Db\ResultSet\ResultSet;
use Psr\Container\ContainerInterface;

use MicroIceCms\V1\DbAdapter;

class PagesModelFactory
{
    public function __invoke(ContainerInterface $container) : PagesModel
    {
        $dba = $container->get(DbAdapter::class);
        $dbo = $container->get('config')['micro-ice-db']['options']['v1'];
        $table = 'pages';
        if(!empty($dbo['table_prefix'])){
            $table = $dbo['table_prefix'].$table;
        }
        
        /**
         * TODO: add features in config and get them from container
         */
        $features = null;
        if(!empty($dbo['general_features'])){
            $features = new FeatureSet();
            foreach($dbo['general_features'] as $feature){
                $features->addFeature($container->get($feature));    
            }
        }
        
        $rsp = new ResultSet();
        $rsp->setArrayObjectPrototype(new PagesEntity());
        
        
        /**
         * Constructor
         *
         * @param string|TableIdentifier|array                                              $table
         * @param AdapterInterface                                                          $adapter
         * @param Feature\AbstractFeature|Feature\FeatureSet|Feature\AbstractFeature[]|null $features
         * @param ResultSetInterface|null                                                   $resultSetPrototype
         * @param Sql|null                                                                  $sql
         *
         * @throws Exception\InvalidArgumentException
         */
        return new PagesModel($table, $dba, $features, $rsp);
    }
}