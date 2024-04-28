<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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

    // public function render($request, Exception $exception)
    // {
    //     if ($exception instanceof TokenMismatchException) {
    //         // CSRFトークンエラーの場合、トップページにリダイレクト
    //         return redirect(route('top'))->with('status', 'セッションがタイムアウトしました。再度お試しください。');
    //     }

    //     return parent::render($request, $exception);
    // }

    public function render($request, Throwable $exception)
    {
        // Tokenエラーの時、ログイン画面にリダイレクトする。
        if ($exception instanceof TokenMismatchException) {
            return redirect(route('top'))->with('status', 'timeout');
        }

        return parent::render($request, $exception);
    }
}
