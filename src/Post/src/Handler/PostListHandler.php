<?php

declare(strict_types=1);

namespace Post\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Post\Entity\Post;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

class PostListHandler implements RequestHandlerInterface
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $query = $this->entityManager->getRepository("Post\Entity\Post")
            ->createQueryBuilder("alias")
            ->getQuery();

        $paginator = new Paginator($query);

        $records = $paginator->getQuery()->getResult(Query::HYDRATE_ARRAY);
        
        return new JsonResponse($records);
    }
}
