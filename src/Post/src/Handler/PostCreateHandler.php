<?php

declare(strict_types=1);

namespace Post\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use Post\Entity\Post;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

class PostCreateHandler implements RequestHandlerInterface
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $result = [];
        $requestBody = $request->getParsedBody();

        if (empty($requestBody)) {
            $result['_error']['error'] = 'missing_request';
            $result['_error']['error_description'] = 'No request body sent.';

            return new JsonResponse($result, 400);
        }

        $entity = new Post();

        try {
            $entity->setPost($requestBody);
            $entity->setCreated(new \DateTime("now"));

            $this->entityManager->persist($entity);
            $this->entityManager->flush();
        } catch(ORMException $e) {
            $result['_error']['error'] = 'not_created';
            $result['_error']['error_description'] = $e->getMessage();

            return new JsonResponse($result, 400);
        }

        return new JsonResponse('Post Created', 201);
    }
}
