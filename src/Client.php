<?php

namespace eadortsu\GraphQL;

use Illuminate\Support\Facades\Request;

class Client
{
    protected $client;
    protected $config;
    protected $endpoint_url;

    public function __construct()
    {
        $this->config = config('graphql-client');
        $this->endpoint_url = $this->config['endpoint_url'];
        $this->client = new \EUAutomation\GraphQL\Client();
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

        $this->client->setUrl($endpoint_url);

        $header = [];

        if ($this->config['authorization_type'] == "bearer") {
            $authorization = 'Bearer ' . $token;
            $header['Authorization'] = $authorization;
        }
        if ($this->config['authorization_type'] == "api key") {
            $header[$this->config['key']] = $token;
        }
        return $this->client->response($query, $variables, $header);
    }
}
