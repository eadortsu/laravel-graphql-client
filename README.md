# Laravel GraphQL Client
This package can be used to consume graphql APIs in your laravel or lumen project.

## Installation

You can install the package via composer:

```
composer require eadortsu/laravel-graphql-client
```

## For laravel:

```
php artisan vendor:publish --provider="eadortsu\GraphQL\GraphQLClientServiceProvider" 
```

## For lumen:

Copy and setting up config:

```
cp vendor/eadortsu/laravel-graphql-client/config/config.php config/graphql-client.php
```

Add to `bootstrap/app.php`

```
$app->configure('graphql-client');
$app->register(eadortsu\GraphQL\GraphQLClientServiceProvider::class);
```

## Usage

### Code
```php


$query = <<<QUERY
query {
    users {
        id
        email
    }
}
QUERY;

$mutation = <<<MUTATION
mutation {
    login(data: {
        username: "user@mail.com"
        password: "qwerty"
    }) {
        access_token
        refresh_token
        expires_in
        token_type
    }
}
MUTATION;
$variables = [
"username" => "eadortsu",
"email" => "mail@eadortssu.com"
];
$graphqlendpoint_url = "https://eadortsu.com/graphql";


$queryResponse = eadortsu\GraphQL\Facades\Client::fetch($query, $graphqlendpoint_url);
$queryResponse = eadortsu\GraphQL\Facades\Client::fetch($query,$graphqlendpoint_url, [], $token ); // leavel an empty array if there no variables.
$mutationResponse = eadortsu\GraphQL\Facades\Client::fetch($mutation, $graphqlendpoint_url, $variables, $token);

```
