<?php
declare(strict_types=1);

namespace MicroIceCms\V1\Rest\Pages\Exception;

use Throwable;
use Zend\ProblemDetails\Exception\CommonProblemDetailsExceptionTrait;
use Zend\ProblemDetails\Exception\ProblemDetailsExceptionInterface;

class InvalidArgumentException extends \InvalidArgumentException implements ProblemDetailsExceptionInterface
{
    use CommonProblemDetailsExceptionTrait;
    
    public function __construct (string $message = "" , int $code = 0 , Throwable $previous = NULL )
    {
        $this->status = $code;
        $this->detail = $message;
        $this->type = '/api/doc/invalid-parameter';
        $this->title = 'Invalid parameter';
        
        parent::__construct($message, $code, $previous);
    }
}