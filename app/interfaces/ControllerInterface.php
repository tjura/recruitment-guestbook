<?php

namespace app\interfaces;

/**
 * @author Tomasz Jura <jura.tomasz@gmail.com>
 */
interface ControllerInterface
{
    public function render(string $view, array $params = []): string;

    public function getPost(string $key, mixed $default = null): mixed;

    public function getParam(string $key, mixed $default = null): mixed;
}
