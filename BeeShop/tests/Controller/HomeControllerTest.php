<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class HomeControllerTest extends WebTestCase

{
    /** @test */
    public function index(){
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $crawler = $client->request('GET', '/');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Bienvenue")')->count()
        );
      
    }


    public function testPageSuccessful()
    {
        $client = self::createClient();
        $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful());

    }

}