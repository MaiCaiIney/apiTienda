<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $instance = $this;
        Response::macro('ok', function ($data = [], $message = 'Solicitud procesada con éxito.') {
            $response = [
                'mensaje' => $message,
                'datos' => $data
            ];
            return Response::json($response, 200);
        });

        Response::macro('created', function ($data = [], $message = 'Solicitud procesada con éxito.') {
            $response = [
                'mensaje' => $message,
                'datos' => $data
            ];
            return Response::json($response, 201);
        });

        Response::macro('noContent', function () {
            return Response::json([], 204);
        });

        Response::macro('badRequest', function ($errors = [], $message = 'Validación fallida.') use ($instance) {
            return $instance->handleErrorResponse($message, $errors, 400);
        });

        Response::macro('unauthorized', function ($errors = [], $message = 'Usuario no autorizado.') use ($instance) {
            return $instance->handleErrorResponse($message, $errors, 401);
        });

        Response::macro('forbidden', function ($errors = [], $message = 'Acceso denegado.') use ($instance) {
            return $instance->handleErrorResponse($message, $errors, 403);
        });

        Response::macro('notFound', function ($errors = [], $message = 'No se encuentra el recurso.') use ($instance) {
            return $instance->handleErrorResponse($message, $errors, 404);
        });

        Response::macro('internalServerError', function ($errors = [], $message = 'Error interno del sistema') use ($instance) {
            return $instance->handleErrorResponse($message, $errors, 500);
        });
    }

    function handleErrorResponse($message, $errors, $status)
    {
        $response = [ 'mensaje' => $message ];

        if (count($errors)) {
            $response['errores'] = $errors;
        }

        return Response::json($response, $status);
    }
}
