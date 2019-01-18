<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/** @test */
class HomeControllerTest extends WebTestCase
{

    public function showHomePage(){
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        // $crawler = $client->request('GET', '/');
    }

}