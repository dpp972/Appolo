<?php

namespace Appolo\WebServiceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestControllerTest extends WebTestCase
{
    public function testGetobjects()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/list/{entityName}');
    }

}
