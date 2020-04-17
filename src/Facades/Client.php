<?php

namespace eadortsu\GraphQL\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \eadortsu\GraphQL\Client
 * @method static Client fetch(string $query, string $endpoint_url, array $variables = [], string $token = ''): \EUAutomation\GraphQL\Response
 */
class Client extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \eadortsu\GraphQL\Client::class;
    }
}
