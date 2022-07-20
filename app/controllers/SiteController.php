<?php

namespace app\controllers;

use app\database\Paginator;
use app\models\Post;
use app\prototypes\ControllerPrototype;

class SiteController extends ControllerPrototype
{

    public function create(): string
    {
        if ($this->getPost(key: 'username') && $this->getPost(key: 'content')) {
            $entity = new Post();
            $entity->setUsername($this->getPost(key: 'username'));
            $entity->setContent($this->getPost(key: 'content'));
            $this->entityManager->persist(entity: $entity);
            $this->entityManager->flush();
            header(header: 'Location: /site/index');
            exit();
        }

        return $this->render(view: 'site/error');
    }

    public function index(): string
    {
        $repository = $this->entityManager->getRepository(entityName: Post::class);
        $paginator = new Paginator(
            entityRepository: $repository,
            currentPage: $this->getParam(key: 'page', default: 0)
        );
        $elements = $paginator->getElements();

        return $this->render(view: 'site/index', params: [
            'models' => $elements,
            'paginator' => $paginator
        ]);
    }

}
