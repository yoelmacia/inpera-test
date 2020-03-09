<?php

declare(strict_types=1);

namespace Post\Handler;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class PostDeleteHandlerFactory
{
    public function __invoke(ContainerInterface $container) : PostDeleteHandler
    {
        $entityManager = $container->get(EntityManager::class);
        return new PostDeleteHandler($entityManager);
    }
}
