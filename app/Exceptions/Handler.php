<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
    if ($exception instanceof HttpException) {
        $statusCode = $exception->getStatusCode();
        
        if ($statusCode === 200) {
            // Custom handling for 404 errors
            return response()->view('errors.200', [], 200);
        }
        if ($statusCode === 301) {
            // Custom handling for 404 errors
            return response()->view('errors.301', [], 301);
        }
        // if ($statusCode === 404) {
        //     // Custom handling for 404 errors
        //     // print_r(var_dump($request->wantsJson()));exit;
        //     // if($request->wantsJson()){
                
        //     //     return response()->json(['message'=>'Page not found'], status:404);
        //     // }
        //     // return "hi";
        // }
        if ($statusCode === 500) {
            // Custom handling for 404 errors
            return response()->view('errors.500', [], 500);
        }
        
        // Handle other HTTP errors as needed
        // ...
    }

    return parent::render($request, $exception);
    }
}
