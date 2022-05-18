<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        $this->reportable(static fn (Throwable $exception) => []);
    }

    /** @noinspection PhpParameterNameChangedDuringInheritanceInspection */
    public function report(Throwable $exception): void
    {
        if ($this->shouldReport($exception) && app()->bound('sentry')) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }
}
