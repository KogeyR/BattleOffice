<?php
namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiCommerce
{
    public function __construct(private HttpClientInterface $httpClient,private readonly ParameterBagInterface $parameterBag ) 
    {
    }

    public function getOrder()
    {
        $CommerceApiKey = $this->parameterBag->get('Api_Commerce');
    }
}