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

class PostDeleteHandler implements RequestHandlerInterface
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $result = [];

        $entityRepository = $this->entityManager->getRepository(Post::class);

        $entity = $entityRepository->find($request->getAttribute('id'));

        if (empty($entity)) {
            $result['_error']['error'] = 'not_found';
            $result['_error']['error_description'] = 'Record not found.';

            return new JsonResponse($result, 404);
        }

        try {
            $this->entityManager->remove($entity);
            $this->entityManager->flush();
        } catch(ORMException $e) {
            $result['_error']['error'] = 'not_removed';
            $result['_error']['error_description'] = $e->getMessage();

            return new JsonResponse($result, 400);
        }

        $result = ['deleted_id' => $request->getAttribute('id')];

        return new JsonResponse($result);
    }
}
