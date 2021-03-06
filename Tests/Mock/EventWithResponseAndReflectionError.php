<?php

declare(strict_types=1);

namespace Auxmoney\OpentracingBundle\Tests\Mock;

use ReflectionException;
use Symfony\Component\HttpFoundation\Request;

final class EventWithResponseAndReflectionError
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
    
    /**
     * @throws ReflectionException
     */
    public function getResponse(): void
    {
        throw new ReflectionException('could not get response!');
    }
}
