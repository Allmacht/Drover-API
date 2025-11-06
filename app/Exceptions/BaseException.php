<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class BaseException extends Exception
{
    public function __construct(
        int $code, string $message, private ?string $type = null, private array $arguments = [], ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * The function returns an array containing the code, fault arguments, fault type, and fault
     * message.
     *
     * @return array An array is being returned. The array contains the following keys and values:
     */
    public function getBody(): array
    {
        return [
            'code' => $this->getCode(),
            'fault' => [
                'arguments' => $this->arguments,
                'type' => $this->type,
                'message' => trans($this->getMessage()),
            ],
        ];
    }
}
