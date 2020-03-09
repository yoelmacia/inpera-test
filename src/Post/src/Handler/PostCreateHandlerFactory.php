<?php

declare(strict_types=1);

namespace Post\Handler;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class PostCreateHandlerFactory
{
    public function __invoke(ContainerInterface $container) : PostCreateHandler
    {
        $entityManager = $container->get(EntityManager::class);
        return new PostCreateHandler($entityManager);
    }
}
