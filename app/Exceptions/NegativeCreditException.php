<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class NegativeCreditException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return null|\Illuminate\Http\Response
     */
    public function render($request)
    {
        return null;
    }
}
