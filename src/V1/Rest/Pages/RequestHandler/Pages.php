<?php

declare(strict_types=1);

namespace MicroIceCms\V1\Rest\Pages\RequestHandler;

use Zend\Expressive\Hal\HalResponseFactory;
use Zend\Expressive\Hal\ResourceGenerator;
// use Zend\Expressive\Helper\UrlHelper;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
// use Zend\Diactoros\Response\EmptyResponse;
use MicroIceCms\RestDispatchTrait;
use MicroIceCms\V1\Rest\Pages\Repository;

class Pages implements RequestHandlerInterface
{
    private $model;

    use RestDispatchTrait;

    public function __construct(
        Repository\PagesModel $model,
        ResourceGenerator $resourceGenerator,
        HalResponseFactory $responseFactory
    ) {
        $this->model = $model;
        $this->resourceGenerator = $resourceGenerator;
        $this->responseFactory = $responseFactory;
    }
    
    public function get(ServerRequestInterface $request) : ResponseInterface
    {
        return new JsonResponse(['ack' => 21]);
    }
}