<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait HandlerRequest
{
    /**
     * Handle a request with a callback and handle exceptions.
     *
     * @param callable $callback
     * @param string $errorMessage
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function handleRequest(callable $callback, string $errorMessage = 'Ocorreu um erro, tente novamente.')
    {
        try {
            return $callback();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withErrors($errorMessage);
        }
    }

    /**
     * Redirect with a success message.
     *
     * @param string $route
     * @param array $params
     * @param string $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectWithSuccess(string $route, array $params = [], string $message = '')
    {
        return redirect()->route($route, $params)->with('success', $message);
    }
}
