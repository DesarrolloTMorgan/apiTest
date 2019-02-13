<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // This will replace our 404 response with
        // a JSON response
        if($exception instanceof ModelNotFoundException && 
            $request->wantsJson()){
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        } elseif ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);

        } elseif ($exception instanceof AuthorizationException) {
            return $this->unautoauthorizated($request, $exception);

        } elseif ($this->isHttpException($exception)) {
            if ($exception instanceof NotFoundHttpException) {
                return response()->json('error_404_path');
            }
            return 'error_4004_path';
        }
    
        return parent::render($request, $exception);
        //return response()->json(['status' => 'error','message' => 'You pass invalid token']);
    }

    protected function unauthenticated ($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {

            /** return response()->json(['error' => 'Unauthenticated.'], 401); */

            	$response = ['status' => 'error','message' => 'You pass invalid token'];

            	return response()->json($response);

        } 
        return redirect()->guest('home');
        //return response()->json(['error' => 'Unauthenticated'], 401);
    }

    protected function unauthorizated ($request, AuthorizationException $exception)
    {
        return response()->json(['error' => 'Unauthorizated'], 401);
    }

}