<?php

declare(strict_types=1);

namespace MicroIceCms\V1\Rest\Pages\RequestHandler;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Hal\HalResponseFactory;
use Zend\Expressive\Hal\ResourceGenerator;
use MicroIceCms\V1\Rest\Pages\Repository;

class PagesFactory
{
    public function __invoke(ContainerInterface $container) : Pages
    {
        return new Pages(
            $container->get(Repository\PagesModel::class),
            $container->get(ResourceGenerator::class),
            $container->get(HalResponseFactory::class)
        );
    }
}