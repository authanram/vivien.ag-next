<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

abstract class ViewAction extends Action
{
    /**
     * @param Request $request
     * @return View|string
     */
    abstract public function response(Request $request): View|string;

    public function __construct(protected Request $request)
    {
    }

    public function handle(string|int $subject = null): View|string
    {
        return $this->response($this->request, $subject);
    }

    public function htmlResponse(View|string $response): View|string
    {
        return $response;
    }
}
