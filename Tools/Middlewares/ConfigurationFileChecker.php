<?php declare(strict_types = 1);
namespace LibertAPI\Tools\Middlewares;

use Psr\Http\Message\ServerRequestInterface as IRequest;
use Psr\Http\Message\ResponseInterface as IResponse;

/**
 * Récupère les informations du fichier de configuration
 *
 * @since 1.3
 */
final class ConfigurationFileChecker extends \LibertAPI\Tools\AMiddleware
{
    public function __invoke(IRequest $request, IResponse $response, callable $next) : IResponse
    {
        $configuration = ('ci' == $request->getHeaderLine('stage', null))
            ? $this->getTestConfiguration()
            : $this->getRealConfiguration();
        $this->getContainer()->set('configurationFileData', $configuration);

        return $next($request, $response);
    }

    private function getTestConfiguration() : \stdClass
    {
        return new \stdClass();
    }

    private function getRealConfiguration() : \stdClass
    {
        $configuration = json_decode(file_get_contents(ROOT_PATH . DS . 'configuration.json'));
        if (0 !== json_last_error()) {
            throw new \Exception('Configuration file is not JSON');
        }

        return $configuration;
    }
}
