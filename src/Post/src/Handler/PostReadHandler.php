<?php

declare(strict_types=1);

namespace Post\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PostReadHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        // Create and return a response
    }
}
