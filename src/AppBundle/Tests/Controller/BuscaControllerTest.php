<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BuscaControllerTest extends WebTestCase
{
    public function testBuscar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/buscar');
    }
}
