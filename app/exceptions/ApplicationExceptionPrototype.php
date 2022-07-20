<?php

namespace app\exceptions;
use Exception;
use Throwable;

/**
 * @author Tomasz Jura <jura.tomasz@gmail.com>
 */
abstract class ApplicationExceptionPrototype extends Exception implements Throwable
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
