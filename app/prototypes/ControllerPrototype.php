<?php

namespace app\prototypes;

use app\Application;
use app\interfaces\ControllerInterface;
use Doctrine\ORM\EntityManager;

/**
 * @author Tomasz Jura <jura.tomasz@gmail.com>
 */
class ControllerPrototype implements ControllerInterface
{
    protected EntityManager $entityManager;
    protected string $layout = 'layout.php';

    public function __construct(protected Application $application)
    {
        $this->entityManager = $this->application->getConnection()->getEntityManager();
    }

    public function render(string $view, array $params = []): string
    {
        $content = $this->renderContent(view: $view, params: $params);

        return $this->renderLayout(content: $content);
    }

    protected function renderContent(string $view, array $params = []): string
    {
        $viewPath = $this->application->getViewPath() . $view . '.php';
        ob_start();
        foreach ($params as $variableName => $param) {
            $$variableName = $param;
        }
        include_once $viewPath;

        return ob_get_clean();
    }

    protected function renderLayout(string $content): string
    {
        $layoutPath = $this->application->getViewPath() . '/layouts/' . $this->layout;
        ob_start();
        include $layoutPath;

        return ob_get_clean();
    }

    public function getPost(string $key, mixed $default = null): mixed
    {
        return $this->getRequest($key, $_POST, $default);
    }

    private function getRequest(string $key, array $data = [], mixed $default = null): mixed
    {
        if (array_key_exists($key, $data)) {
            return $data[$key];
        }

        return $default;
    }

    public function getParam(string $key, mixed $default = null): mixed
    {
        return $this->getRequest($key, $_GET, $default);
    }

}
