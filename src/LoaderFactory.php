<?php

namespace Aa\AkeneoDataLoader;

use Aa\AkeneoDataLoader\Api\ApiSelector;
use Aa\AkeneoDataLoader\Api\Credentials;
use Aa\AkeneoDataLoader\Response\ResponseValidator;
use Akeneo\Pim\ApiClient\AkeneoPimClientBuilder;
use Akeneo\Pim\ApiClient\AkeneoPimClientInterface;

class LoaderFactory
{
    public function createByApiClient(AkeneoPimClientInterface $client, int $upsertBatchSize = 100): LoaderInterface
    {
        $apiSelector = new ApiSelector($client);
        $responseValidator = new ResponseValidator();

        return new Loader($apiSelector, $responseValidator);
    }

    public function createByCredentials(Credentials $apiCredentials): LoaderInterface
    {
        $clientBuilder = new AkeneoPimClientBuilder($apiCredentials->getBaseUri());

        $client = $clientBuilder->buildAuthenticatedByPassword(
            $apiCredentials->getClientId(),
            $apiCredentials->getSecret(),
            $apiCredentials->getUsername(),
            $apiCredentials->getPassword()
        );

        return $this->createByApiClient($client);
    }
}
