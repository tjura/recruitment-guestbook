<?php

namespace app;

use app\controllers\SiteController;
use app\database\Connection;
use app\exceptions\ApplicationExceptionPrototype;
use app\exceptions\PageNotFoundException;
use app\interfaces\ControllerInterface;
use Throwable;

/**
 * Simple application wrapper
 * @author Tomasz Jura <jura.tomasz@gmail.com>
 */
class Application
{
    public const CONTROLLER_NAMESPACE = 'app\\controllers\\';
    public const DEFAULT_CONTROLLER = SiteController::class;
    public const DEFAULT_ACTION = 'index';
    protected Connection $connection;
    private ControllerInterface $controller;
    private string $action;

    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function run()
    {
        try {
            echo $this->routing();
        } catch (ApplicationExceptionPrototype $exception) {
            echo $exception->getMessage();
            exit();
        }
    }

    /**
     * @throws PageNotFoundException
     */
    protected function routing(): string
    {
        $this->resolveController();
        return $this->runAction();
    }

    /**
     * Resolving controller and action from request
     * @throws PageNotFoundException
     */
    protected function resolveController(): void
    {
        try {
            preg_match_all('(w*/\w*)', $_SERVER['REQUEST_URI'], $matches);
            if (array_key_exists(0, $matches[0])) {
                $controller = str_replace('/', '', $matches[0][0]);

                if ('' === $controller) {
                    $class = self::DEFAULT_CONTROLLER;
                } else {
                    $class = self::CONTROLLER_NAMESPACE . ucfirst($controller) . 'Controller';
                }

                if (false === array_key_exists(1, $matches[0])) {
                    $action = self::DEFAULT_ACTION;
                } else {
                    $action = str_replace('/', '', $matches[0][1]);
                }
                $this->setController($class, $action);

                return;
            }
        } catch (PageNotFoundException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
        }
        $this->setController(class: self::DEFAULT_CONTROLLER, action: self::DEFAULT_ACTION);
    }

    /**
     * @throws PageNotFoundException
     */
    private function setController(string $class, string $action): void
    {
        try {
            $this->controller = new $class($this);
            if (false === method_exists(object_or_class: $this->controller, method: $action)) {
                throw new PageNotFoundException(message: 'Action not found: ' . $action);
            }
            $this->action = $action;
        } catch (PageNotFoundException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            throw new PageNotFoundException(message: 'Controller ' . $class . ' not found');
        }
    }

    protected function runAction(): string
    {
        return $this->controller->{$this->action}();
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }

    public function getViewPath(): string
    {
        return $this->getPWD() . '/views/';
    }

    public function getPWD(): string
    {
        return $_SERVER['PWD'];
    }

}
