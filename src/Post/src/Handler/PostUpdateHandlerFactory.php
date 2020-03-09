<?php

declare(strict_types=1);

namespace Post\Handler;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class PostUpdateHandlerFactory
{
    public function __invoke(ContainerInterface $container) : PostUpdateHandler
    {
        $entityManager = $container->get(EntityManager::class);
        return new PostUpdateHandler($entityManager);
    }
}
