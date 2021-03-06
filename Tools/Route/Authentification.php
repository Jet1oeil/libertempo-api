<?php declare(strict_types = 1);

use LibertAPI\Tools\Controllers\AuthentificationController as Auth;
use Psr\Http\Message\ServerRequestInterface as IRequest;
use Psr\Http\Message\ResponseInterface as IResponse;

/*
 * Doit être importé après la création de $app. Ne créé rien.
 * On décrit à la main le callable pour passer la configuration. Peut être pas idéal, mais ça fait le job.
 * On verra s'il y a besoin d'une solution plus robuste
 */
$app->get('/authentification', function (IRequest $request, IResponse $response, array $args) {
    $configs = ['configurationFileData' => $this->get('configurationFileData')];
    return $this->get(Auth::class)->get($request, $response, $configs);
})->setName('authentification');
