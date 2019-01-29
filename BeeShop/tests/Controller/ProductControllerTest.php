<?php

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ProductControllerTest extends WebTestCase
{
    /** @test */
    public function index(){
        $client = static::createClient();
        $client->request('GET', '/produits');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $crawler = $client->request('GET', '/produits');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("produits")')->count()
        );
        
    }

    /**
     * @dataProvider provideUrls
     * @test
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls()
    {
        return [
            ['/produits'],
        ];
    }

    public function click()
    {
        
        $client = static::createClient();
        $client->request('GET', '/produits');
        $crawler = $client->request('GET', '/produits');

        /**
         * trouver tous les liens avec 
         * comme texte => le titre de l'article
         */
        $link = $crawler
            ->filter('a:contains("Miel de Manuka")')
            ->eq(1)
            ->link()
        ;

        /**
         * cliquer sur le lien 
         */
        $crawler = $client->click($link);
    }

    /**
     * Page d'un produit 
     * @test */
    public function show()
    {
        $client = static::createClient();
        $client->request('GET', '/produits/miel-de-manuka-a-ne-pas-supprimer-pour-les-tests-18');

        $fake = static::createClient();
        $fake->request('GET', '/produits/a-product-that-does-not-exit-100');

        $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 2xx');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertFalse($client->getResponse()->isNotFound());
        $this->assertTrue($fake->getResponse()->isNotFound());
        $this->assertContains('produits', $client->getResponse()->getContent());

        $this->assertRegExp(
            '/produits(a-product-that-does-not-exit-100)?/', 
            $client->getResponse()->getContent()
            
        );

        
        $this->assertRegExp(
            '/produits(miel-de-manuka-a-ne-pas-supprimer-pour-les-tests-18)?/', 
            $client->getResponse()->getContent()
            
        );

        $crawler = $client->request('GET', '/produits/miel-de-manuka-a-ne-pas-supprimer-pour-les-tests-18');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Description")')->count()
        );
    }
}