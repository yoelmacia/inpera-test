<?php

declare(strict_types=1);

namespace Post\Handler;

use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class PostListHandlerFactory
{
    public function __invoke(ContainerInterface $container) : PostListHandler
    {
        $entityManager = $container->get(EntityManager::class);
        return new PostListHandler($entityManager);
    }
}
