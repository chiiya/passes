<?php declare(strict_types=1);

namespace Chiiya\Passes\Exceptions;

use RuntimeException;
use Throwable;

class ValidationException extends RuntimeException
{
    /** Validation error messages. */
    protected array $errors;

    public function __construct($message = '', array $errors = [], $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $message."\n Errors: ".json_encode($errors);
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
