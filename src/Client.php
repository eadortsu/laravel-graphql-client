<?php

namespace eadortsu\GraphQL;

use Illuminate\Support\Facades\Request;

class Client
{
    protected $config;

    public function __construct()
    {
        $this->config = config('graphql-client');
    }


    /**
     * @param string $query
     * @param $endpoint_url
     * @param array $variables
     * @param string $token
     * @return \EUAutomation\GraphQL\Response
     */
    public function fetch(string $query,string $endpoint_url, array $variables = [], string $token = ''): \EUAutomation\GraphQL\Response
    {

        $client = new \EUAutomation\GraphQL\Client($endpoint_url);

        $header = [];

        if ($this->config['authorization_type'] == "bearer") {
            $authorization = 'Bearer ' . $token;
            $header['Authorization'] = $authorization;
        }
        if ($this->config['authorization_type'] == "api key") {
            $header[$this->config['key']] = $token;
        }
        return $client->response($query, $variables, $header);
    }
}
