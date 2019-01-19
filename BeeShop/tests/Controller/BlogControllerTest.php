<?php 

namespace App\tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

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

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
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
