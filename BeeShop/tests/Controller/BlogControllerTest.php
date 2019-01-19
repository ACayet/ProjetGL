<?php 

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DomCrawler\Crawler;

class BlogControllerTest extends WebTestCase
{

    /** @test */
    public function index()
    {
        $client = static::createClient();
        $client->request('GET', '/blog');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $crawler = $client->request('GET', '/blog');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Blog")')->count()
        );
        
    }

    /**
     * page d'un article du blog
     * @test */
    public function show()
    {
        $client = static::createClient();
        $client->request('GET', '/blog/quels-sont-les-bienfaits-du-miel-4');

        $fake = static::createClient();
        $fake->request('GET', '/blog/a-fake-url-to-test-99');

     
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertFalse($client->getResponse()->isNotFound());
        $this->assertTrue($fake->getResponse()->isNotFound());

        $this->assertRegExp(
            '/blog(a-fake-url-to-test-99)?/', 
            $client->getResponse()->getContent()
            
        );

        
        $this->assertRegExp(
            '/blog(quels-sont-les-bienfaits-du-miel-4)?/', 
            $client->getResponse()->getContent()
            
        );

        $crawler = $client->request('GET', '/blog/quels-sont-les-bienfaits-du-miel-4');
        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("écrit")')->count()
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
            ['/blog'],
        ];
    }

    public function click()
    {
        $client = static::createClient();
        $client->request('GET', '/blog');
        $crawler = $client->request('GET', '/blog');

        /**
         * trouver tous les liens avec 
         * comme texte => le titre de l'article
         */
        $link = $crawler
            ->filter('a:contains("Quels sont les bienfaits du miel ?")')
            ->eq(1)
            ->link()
        ;

        /**
         * cliquer sur le lien 
         */
        $crawler = $client->click($link);
    }
}
