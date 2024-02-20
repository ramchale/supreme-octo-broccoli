<?php

declare(strict_types=1);

use App\Handler\AccessForAllLpaConfirmationHandler;
use App\Handler\AccessForAllLpaValidationHandler;
use App\Handler\AddLpaConfirmationHandler;
use App\Handler\AddLpaValidationHandler;
use App\Handler\AuthHandler;
use App\Handler\CanPasswordResetHandler;
use App\Handler\CanResetEmailHandler;
use App\Handler\ChangePasswordHandler;
use App\Handler\CompleteChangeEmailHandler;
use App\Handler\CompleteDeleteAccountHandler;
use App\Handler\CompletePasswordResetHandler;
use App\Handler\HealthcheckHandler;
use App\Handler\LpasCollectionHandler;
use App\Handler\LpasResourceCodesCollectionHandler;
use App\Handler\LpasResourceHandler;
use App\Handler\LpasResourceImagesCollectionHandler;
use App\Handler\NotifyHandler;
use App\Handler\OneLoginAuthenticationCallbackHandler;
use App\Handler\OneLoginAuthenticationRequestHandler;
use App\Handler\RequestChangeEmailHandler;
use App\Handler\RequestCleanseHandler;
use App\Handler\RequestPasswordResetHandler;
use App\Handler\UserActivateHandler;
use App\Handler\UserHandler;
use App\Handler\ViewerCodeFullHandler;
use App\Handler\ViewerCodeSummaryHandler;
use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Handler\HomePageHandler::class, 'home');
 * $app->post('/album', App\Handler\AlbumCreateHandler::class, 'album.create');
 * $app->put('/album/{id}', App\Handler\AlbumUpdateHandler::class, 'album.put');
 * $app->patch('/album/{id}', App\Handler\AlbumUpdateHandler::class, 'album.patch');
 * $app->delete('/album/{id}', App\Handler\AlbumDeleteHandler::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Handler\ContactHandler::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Handler\ContactHandler::class,
 *     Mezzio\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */
return function (Application $app, MiddlewareFactory $factory, ContainerInterface $container) : void {
    $app->get('/healthcheck', HealthcheckHandler::class, 'healthcheck');

    $app->get('/v1/lpas/{user-lpa-actor-token:[0-9a-f\-]+}', LpasResourceHandler::class, 'lpa.resource');
    $app->delete('/v1/lpas/{user-lpa-actor-token:[0-9a-f\-]+}', LpasResourceHandler::class, 'lpa.remove');
    $app->post(
        '/v1/lpas/{user-lpa-actor-token:[0-9a-f\-]+}/codes',
        LpasResourceCodesCollectionHandler::class,
        'lpa.create.code'
    );
    $app->get(
        '/v1/lpas/{user-lpa-actor-token:[0-9a-f\-]+}/codes',
        LpasResourceCodesCollectionHandler::class,
        'lpa.get.codes'
    );
    $app->put(
        '/v1/lpas/{user-lpa-actor-token:[0-9a-f\-]+}/codes',
        LpasResourceCodesCollectionHandler::class,
        'lpa.cancel.code'
    );
    $app->get(
        '/v1/lpas/{user-lpa-actor-token:[0-9a-f\-]+}/images',
        LpasResourceImagesCollectionHandler::class,
        'lpa.get.images'
    );
};
